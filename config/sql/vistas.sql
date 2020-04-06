SELECT 

	alumnos.id as alumno_id,
    alumnos.escolar as alumno_cedula_escolar,
    alumnos.cedula as alumno_cedula,
    alumnos.nombre as alumno_nombre,
    alumnos.apellido as alumno_apellido,
    alumnos.telefono as alumno_telefono,
    alumnos.nacimiento as alumno_nacimiento,
    alumnos.direccion as alumno_direccion,
    
    sexo_a.id as alumno_sexo_id,
    sexo_a.descripcion as alumno_sexo,
    
    deporte_a.id as alumno_deporte_id,
    deporte_a.descripcion as alumno_deporte,
    
    social_a.id as alumno_social_id,
    social_a.descripcion as alumno_social,
    
    grado_a.id as alumno_grado_id,
    grado_a.descripcion as alumno_grado,
    
    seccion_a.id as alumno_seccion_id,
    seccion_a.descripcion as alumno_seccion,
    
    turno_a.id as alumno_turno_id,
    turno_a.descripcion as alumno_turno,
    
    amtropometria_a.id as alumno_amtropometria_id,
    amtropometria_a.talla as alumno_talla,
    amtropometria_a.peso as alumno_peso,
    amtropometria_a.observacion as alumno_amtropometria_observacion,
    
    visual_a.id as alumno_visual_id,
    lente_a.descripcion as alumno_lente,
    estrabismo_a.descripcion as alumno_estrabismo,
    seguimiento_a.descripcion as alumno_seguimiento,
    derecho_a.descripcion as alumno_ojo_derecho,
    izquierdo_a.descripcion as alumno_ojo_izquierdo,
    
    representante_a.id as alumno_representante_id,
    representante_a.cedula as alumno_representante_cedula,
    representante_a.nombre as alumno_representante_nombre,
    representante_a.apellido as alumno_representante_apellido,
    representante_a.telefono as alumno_representante_telefono,
    representante_a.nacimiento as alumno_representante_nacimiento,
    representante_a.direccion as alumno_representante_direccion,
    
    sexo_r.id as alumno_representante_sexo_id,
    sexo_r.descripcion as alumno_representante_sexo,
    
    trabajo_r.descripcion as alumno_representante_trabajo,
    parentesco_r.descripcion as alumno_representante_parentesco
    

FROM alumnos

JOIN sexos sexo_a on sexo_a.id = alumnos.sexo_id

JOIN alumno_deporte on alumno_deporte.alumno_id = alumnos.id
JOIN deportes deporte_a on deporte_a.id = alumno_deporte.deporte_id

JOIN alumno_social on alumno_social.alumno_id = alumnos.id
JOIN socials social_a on social_a.id = alumno_social.social_id

JOIN alumno_grado on alumno_grado.alumno_id = alumnos.id
JOIN grados grado_a on grado_a.id = alumno_grado.grado_id

JOIN alumno_seccion on alumno_seccion.alumno_id = alumnos.id
JOIN seccions seccion_a on seccion_a.id = alumno_seccion.seccion_id

JOIN alumno_turno on alumno_turno.alumno_id = alumnos.id
JOIN turnos turno_a on turno_a.id = alumno_turno.turno_id

JOIN alumno_amtropometria on alumno_amtropometria.alumno_id = alumnos.id
JOIN amtropometrias amtropometria_a on amtropometria_a.id = alumno_amtropometria.amtropometria_id

JOIN alumno_visual on alumno_visual.alumno_id = alumnos.id
JOIN visuals visual_a on visual_a.id = alumno_visual.visual_id

JOIN booleans lente_a on lente_a.id = visual_a.lente_id
JOIN booleans estrabismo_a on estrabismo_a.id = visual_a.estrabismo_id
JOIN booleans seguimiento_a on seguimiento_a.id = visual_a.seguimiento_id

JOIN visions derecho_a on derecho_a.id = visual_a.derecho_id
JOIN visions izquierdo_a on izquierdo_a.id = visual_a.izquierdo_id

JOIN alumno_representante on alumno_representante.alumno_id = alumnos.id
JOIN representantes representante_a on representante_a.id = alumno_representante.representante_id

JOIN sexos sexo_r on sexo_r.id = representante_a.sexo_id

JOIN trabajos trabajo_r on trabajo_r.id = representante_a.trabajo_id
JOIN parentescos parentesco_r on parentesco_r.id = representante_a.parentesco_id
















<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewGlobal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `view_global` AS
                        SELECT 
                            alumnos.id AS alumno_id,
                            alumnos.escolar AS alumno_cedula_escolar,
                            alumnos.cedula AS alumno_cedula,
                            alumnos.nombre AS alumno_nombre,
                            alumnos.apellido AS alumno_apellido,
                            alumnos.telefono AS alumno_telefono,
                            alumnos.nacimiento AS alumno_nacimiento,
                            alumnos.direccion AS alumno_direccion,

                            sexo_a.id AS alumno_sexo_id,
                            sexo_a.descripcion AS alumno_sexo,

                            deporte_a.id AS alumno_deporte_id,
                            deporte_a.descripcion AS alumno_deporte,

                            social_a.id AS alumno_social_id,
                            social_a.descripcion AS alumno_social,

                            grado_a.id AS alumno_grado_id,
                            grado_a.descripcion AS alumno_grado,

                            seccion_a.id AS alumno_seccion_id,
                            seccion_a.descripcion AS alumno_seccion,

                            turno_a.id AS alumno_turno_id,
                            turno_a.descripcion AS alumno_turno

                            -- amtropometria_a.id AS alumno_amtropometria_id,
                            -- amtropometria_a.talla AS alumno_talla,
                            -- amtropometria_a.peso AS alumno_peso,
                            -- amtropometria_a.observacion AS alumno_amtropometria_observacion,

                            -- visual_a.id AS alumno_visual_id,
                            -- lente_a.descripcion AS alumno_lente,
                            -- estrabismo_a.descripcion AS alumno_estrabismo,
                            -- seguimiento_a.descripcion AS alumno_seguimiento,
                            -- derecho_a.descripcion AS alumno_ojo_derecho,
                            -- derecho_a.code AS alumno_ojo_derecho_code,
                            -- izquierdo_a.descripcion AS alumno_ojo_izquierdo,
                            -- izquierdo_a.code AS alumno_ojo_izquierdo_code,

                            -- representante_a.id AS alumno_representante_id,
                            -- representante_a.cedula AS alumno_representante_cedula,
                            -- representante_a.nombre AS alumno_representante_nombre,
                            -- representante_a.apellido AS alumno_representante_apellido,
                            -- representante_a.telefono AS alumno_representante_telefono,
                            -- representante_a.nacimiento AS alumno_representante_nacimiento,
                            -- representante_a.direccion AS alumno_representante_direccion,

                            -- sexo_r.id AS alumno_representante_sexo_id,
                            -- sexo_r.descripcion AS alumno_representante_sexo,

                            -- trabajo_r.descripcion AS alumno_representante_trabajo,
                            -- parentesco_r.descripcion AS alumno_representante_parentesco


                            FROM alumnos

                            JOIN sexos sexo_a ON sexo_a.id = alumnos.sexo_id

                            JOIN alumno_deporte ON alumno_deporte.alumno_id = alumnos.id
                            JOIN deportes deporte_a ON deporte_a.id = alumno_deporte.deporte_id

                            JOIN alumno_social ON alumno_social.alumno_id = alumnos.id
                            JOIN socials social_a ON social_a.id = alumno_social.social_id

                            JOIN alumno_grado ON alumno_grado.alumno_id = alumnos.id
                            JOIN grados grado_a ON grado_a.id = alumno_grado.grado_id

                            JOIN alumno_seccion ON alumno_seccion.alumno_id = alumnos.id
                            JOIN seccions seccion_a ON seccion_a.id = alumno_seccion.seccion_id

                            JOIN alumno_turno ON alumno_turno.alumno_id = alumnos.id
                            JOIN turnos turno_a ON turno_a.id = alumno_turno.turno_id

                            -- JOIN alumno_amtropometria ON alumno_amtropometria.alumno_id = alumnos.id
                            -- JOIN amtropometrias amtropometria_a ON amtropometria_a.id = alumno_amtropometria.amtropometria_id

                            -- JOIN alumno_visual ON alumno_visual.alumno_id = alumnos.id
                            -- JOIN visuals visual_a ON visual_a.id = alumno_visual.visual_id

                            -- JOIN booleans lente_a ON lente_a.id = visual_a.lente_id
                            -- JOIN booleans estrabismo_a ON estrabismo_a.id = visual_a.estrabismo_id
                            -- JOIN booleans seguimiento_a ON seguimiento_a.id = visual_a.seguimiento_id

                            -- JOIN visions derecho_a ON derecho_a.id = visual_a.derecho_id
                            -- JOIN visions izquierdo_a ON izquierdo_a.id = visual_a.izquierdo_id

                            -- JOIN alumno_representante ON alumno_representante.alumno_id = alumnos.id
                            -- JOIN representantes representante_a ON representante_a.id = alumno_representante.representante_id

                            -- JOIN sexos sexo_r ON sexo_r.id = representante_a.sexo_id

                            -- JOIN trabajos trabajo_r ON trabajo_r.id = representante_a.trabajo_id
                            -- JOIN parentescos parentesco_r ON parentesco_r.id = representante_a.parentesco_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_global');
    }
}
