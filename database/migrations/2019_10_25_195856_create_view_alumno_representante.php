<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAlumnoRepresentante extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `view_alumno_representante` AS
                        SELECT 
                            alumnos.id AS alumno_id,
                            alumnos.escolar AS alumno_cedula_escolar,
                            alumnos.cedula AS alumno_cedula,
                            alumnos.nombre AS alumno_nombre,
                            alumnos.apellido AS alumno_apellido,
                            alumnos.telefono AS alumno_telefono,
                            alumnos.nacimiento AS alumno_nacimiento,
                            alumnos.direccion AS alumno_direccion,

                            representante_a.id AS alumno_representante_id,
                            representante_a.cedula AS alumno_representante_cedula,
                            representante_a.nombre AS alumno_representante_nombre,
                            representante_a.apellido AS alumno_representante_apellido,
                            representante_a.telefono AS alumno_representante_telefono,
                            representante_a.nacimiento AS alumno_representante_nacimiento,
                            representante_a.direccion AS alumno_representante_direccion,

                            sexo_r.id AS alumno_representante_sexo_id,
                            sexo_r.descripcion AS alumno_representante_sexo,

                            trabajo_r.descripcion AS alumno_representante_trabajo,
                            parentesco_r.descripcion AS alumno_representante_parentesco,
                            
                            social_r.descripcion AS alumno_representante_social


                            FROM alumnos


                            JOIN alumno_representante ON alumno_representante.alumno_id = alumnos.id
                            JOIN representantes representante_a ON representante_a.id = alumno_representante.representante_id

                            JOIN sexos sexo_r ON sexo_r.id = representante_a.sexo_id

                            JOIN trabajos trabajo_r ON trabajo_r.id = representante_a.trabajo_id
                            JOIN parentescos parentesco_r ON parentesco_r.id = representante_a.parentesco_id
                            
                            JOIN representante_social ON representante_social.representante_id = representante_a.id
                            JOIN socials social_r ON social_r.id = representante_social.social_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_alumno_representante');
    }
}
