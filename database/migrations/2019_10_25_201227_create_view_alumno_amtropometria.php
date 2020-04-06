<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAlumnoAmtropometria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `view_alumno_amtropometria` AS
                        SELECT 
                            alumnos.id AS alumno_id,
                            alumnos.escolar AS alumno_cedula_escolar,
                            alumnos.cedula AS alumno_cedula,
                            alumnos.nombre AS alumno_nombre,
                            alumnos.apellido AS alumno_apellido,
                            alumnos.telefono AS alumno_telefono,
                            alumnos.nacimiento AS alumno_nacimiento,
                            alumnos.direccion AS alumno_direccion,

                            amtropometria_a.id AS alumno_amtropometria_id,
                            amtropometria_a.talla AS alumno_talla,
                            amtropometria_a.peso AS alumno_peso,
                            amtropometria_a.observacion AS alumno_amtropometria_observacion

                            FROM alumnos

                            JOIN alumno_amtropometria ON alumno_amtropometria.alumno_id = alumnos.id
                            JOIN amtropometrias amtropometria_a ON amtropometria_a.id = alumno_amtropometria.amtropometria_id");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_alumno_amtropometria');
    }
}
