<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAlumnoSocialDeporte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `view_alumno_social_deporte` AS
                        SELECT 
                            alumnos.id AS alumno_id,
                            alumnos.escolar AS alumno_cedula_escolar,
                            alumnos.cedula AS alumno_cedula,
                            alumnos.nombre AS alumno_nombre,
                            alumnos.apellido AS alumno_apellido,
                            alumnos.telefono AS alumno_telefono,
                            alumnos.nacimiento AS alumno_nacimiento,
                            alumnos.direccion AS alumno_direccion,

                            deporte_a.id AS alumno_deporte_id,
                            deporte_a.descripcion AS alumno_deporte,

                            social_a.id AS alumno_social_id,
                            social_a.descripcion AS alumno_social

                            FROM alumnos

                            JOIN alumno_deporte ON alumno_deporte.alumno_id = alumnos.id
                            JOIN deportes deporte_a ON deporte_a.id = alumno_deporte.deporte_id

                            JOIN alumno_social ON alumno_social.alumno_id = alumnos.id
                            JOIN socials social_a ON social_a.id = alumno_social.social_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_alumno_social_deporte');
    }
}
