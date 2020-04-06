DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_min_max`(
	in ha int,
    in fa date,
    in lot int,
    in premio int,
    in carga int,
    out cal_min float,
    out cal_max float
)
BEGIN

	select
		min(total),
		max(total) into cal_min, cal_max
	from
	(SELECT
	   t2.bet_element_id,
	   sum(bet_value_id * premio)/carga*100 as total
	FROM plays t1
	INNER JOIN plays_ticket t2
	ON t1.id = t2.play_id
	INNER JOIN lotteries t3
	ON t1.lottery_id = t3.id
	where date = fa
		and bet_schedule_id = ha
		and lottery_id = lot
		and status = 1
		and t3.deleted_at IS NULL
	GROUP BY t2.bet_element_id) tmp;
    
    IF cal_max>(1/premio)*100 then
		set cal_max = (1/premio)*100;
	END IF;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CargaApuestas`()
BEGIN
	DECLARE finished INTEGER DEFAULT 0;
	declare hora_actual int;
    declare fecha_actual date;
    declare loteria int;
    declare utilidad int;
    declare limite_utilidad float;
    declare criterio_premio int;
    declare total_carga_apuesta int;
    declare resultado_dia_anterior int;
    declare limite_max_perdida float;
    declare escenario_real_min float;
    declare escenario_real_max float;
    declare element_win int;
    DEClARE curLoteria 
        CURSOR FOR 
            SELECT schedules.id, CURDATE(), lotteries.id, percent, payment_x
	FROM schedules_setting
	inner join lotteries on lotteries.id = schedules_setting.lottery_id
	inner join schedules on schedules.id = schedules_setting.schedule_id
	where schedules.id = EXTRACT(HOUR FROM NOW())
		AND lotteries.status = 1
        and lotteries.deleted_at IS NULL;
        
	DECLARE CONTINUE HANDLER 
		FOR NOT FOUND SET finished = 1;
 
    OPEN curLoteria;

getLoteria: LOOP
    FETCH curLoteria INTO hora_actual, fecha_actual, loteria, utilidad, criterio_premio;
    IF finished = 1 THEN 
       LEAVE getLoteria;
    END IF;
    -- build lottery list

    set hora_actual = 13;

    set limite_max_perdida = (1/criterio_premio)*100;
	
	set total_carga_apuesta = cal_total_carga_apuesta(
		hora_actual, fecha_actual, loteria, criterio_premio);
        
	set resultado_dia_anterior = buscar_resultado_dia_anterior(
		hora_actual, fecha_actual, loteria);
        
	call buscar_min_max(hora_actual,fecha_actual,loteria,criterio_premio,total_carga_apuesta, @mini, @maxi);

    set escenario_real_min = @mini;
    set escenario_real_max = @maxi;
    set limite_utilidad = escenario_real_min + (escenario_real_max-escenario_real_min)*(utilidad/3);

SET @ran=0;
SELECT FLOOR(RAND()*(5-1+1)+1) into @ran;

set element_win = elemento_ganador(
	criterio_premio, total_carga_apuesta, fecha_actual, hora_actual,
    loteria, limite_utilidad, resultado_dia_anterior, @ran
);

START TRANSACTION;

INSERT INTO results (
	lottery_id,
    schedules_id,
    element_win_id,
    fecha,
    created_at,
    updated_at
)
VALUES (
	loteria,
    hora_actual,
    element_win,
    fecha_actual,
    now(),
    now()
);

SELECT LAST_INSERT_ID() into @id;

INSERT INTO winners (
    result_id, 
    ticket_id, 
    created_at,
    updated_at
)
SELECT 
    @id,
    ticket_id,
	now(),
    now()
FROM 
    plays_ticket, plays
WHERE 
    plays_ticket.play_id = plays.id
    AND plays.lottery_id = loteria
    AND plays_ticket.bet_element_id = element_win
    AND plays_ticket.bet_schedule_id = hora_actual
    AND plays.date = fecha_actual;

COMMIT;
	set limite_utilidad = 0;
    set total_carga_apuesta = 0;
    set resultado_dia_anterior = 0;
    set limite_max_perdida = 0;
    set escenario_real_min = 0;
    set escenario_real_max = 0;
    set element_win = 0;
    set @ran = 0;

END LOOP getLoteria;
    CLOSE curLoteria;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `buscar_sorteo`(
	OUT `hora_actual` INT, 
    OUT `fecha_actual` DATE, 
    OUT `loteria` INT,
    OUT `premio` INT,
    OUT `utilidad` INT
)
BEGIN
	SELECT
	 schedules.id, CURDATE(), lotteries.id, payment_x, percent 
     into hora_actual, fecha_actual, loteria, premio, utilidad
	FROM schedules_setting
	inner join lotteries on lotteries.id = schedules_setting.lottery_id
	inner join schedules on schedules.id = schedules_setting.schedule_id
	where schedules.id = EXTRACT(HOUR FROM NOW())
		AND lotteries.status = 1
        and lotteries.deleted_at IS NULL;
        
	set hora_actual = 13;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `buscar_resultado_dia_anterior`(
	hora_actual int, 
    fecha_actual date, 
    loteria int
) RETURNS int(11)
BEGIN
	declare elemento int;
    
    SELECT element_win_id into elemento FROM results
	where lottery_id = loteria 
    and schedules_id =hora_actual
    and fecha = fecha_actual;
    
    IF elemento IS NULL then
		set elemento = 0;
	END IF;

RETURN elemento;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `cal_total_carga_apuesta`(
	hora_actual int, 
    fecha_actual date, 
    loteria int, 
    criterio_premio int
) RETURNS int(11)
BEGIN
	declare total int;
	SELECT
	   sum(bet_value_id * criterio_premio) into total
	FROM plays t1
	INNER JOIN plays_ticket t2
	ON t1.id = t2.play_id
	INNER JOIN lotteries t3
	ON t1.lottery_id = t3.id
	where date = fecha_actual
		and bet_schedule_id = hora_actual
		and lottery_id = loteria
		and status = 1
		and t3.deleted_at IS NULL;
RETURN total;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `elemento_ganador`(
	criterio_premio int,
    total_carga_apuesta int,
    fecha_actual date,
    hora_actual int,
    loteria int,
    limite_utilidad float,
    resultado_dia_anterior int,
    ran int
) RETURNS int(11)
BEGIN
	declare element_win int;
    
    SET @numero=0;
	SELECT 
		@numero:=@numero+1 AS posicion,
		elemento 
        into @num, element_win
	FROM
	(SELECT
	   t2.bet_element_id as elemento,
	   count(ticket_id) as cant_jugadas,
	   sum(bet_value_id * criterio_premio)/total_carga_apuesta*100 as total
	FROM plays t1
	INNER JOIN plays_ticket t2
	ON t1.id = t2.play_id
	INNER JOIN lotteries t3
	ON t1.lottery_id = t3.id
	where date = fecha_actual
		and bet_schedule_id = hora_actual
		and lottery_id = loteria
		and status = 1
		and t3.deleted_at IS NULL
		and t2.bet_element_id <> resultado_dia_anterior
	GROUP BY t2.bet_element_id
	HAVING total < limite_utilidad
	order by cant_jugadas desc limit 5) tmp
	HAVING posicion = ran;

RETURN element_win;
END$$
DELIMITER ;
