<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAlumnoGrado extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `view_alumno_grado` AS
                        SELECT 
                            alumnos.id AS alumno_id,
                            alumnos.escolar AS alumno_cedula_escolar,
                            alumnos.cedula AS alumno_cedula,
                            alumnos.nombre AS alumno_nombre,
                            alumnos.apellido AS alumno_apellido,
                            alumnos.telefono AS alumno_telefono,
                            alumnos.nacimiento AS alumno_nacimiento,
                            alumnos.direccion AS alumno_direccion,
                            
                            grado_a.id AS alumno_grado_id,
                            grado_a.descripcion AS alumno_grado,

                            seccion_a.id AS alumno_seccion_id,
                            seccion_a.descripcion AS alumno_seccion,

                            turno_a.id AS alumno_turno_id,
                            turno_a.descripcion AS alumno_turno


                            FROM alumnos

                            JOIN alumno_grado ON alumno_grado.alumno_id = alumnos.id
                            JOIN grados grado_a ON grado_a.id = alumno_grado.grado_id

                            JOIN alumno_seccion ON alumno_seccion.alumno_id = alumnos.id
                            JOIN seccions seccion_a ON seccion_a.id = alumno_seccion.seccion_id

                            JOIN alumno_turno ON alumno_turno.alumno_id = alumnos.id
                            JOIN turnos turno_a ON turno_a.id = alumno_turno.turno_id;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_alumno_grado');
    }
}
