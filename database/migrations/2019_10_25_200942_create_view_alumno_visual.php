<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewAlumnoVisual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("CREATE VIEW `view_alumno_visual` AS
                        SELECT 
                        
                            alumnos.id AS alumno_id,
                            alumnos.escolar AS alumno_cedula_escolar,
                            alumnos.cedula AS alumno_cedula,
                            alumnos.nombre AS alumno_nombre,
                            alumnos.apellido AS alumno_apellido,
                            alumnos.telefono AS alumno_telefono,
                            alumnos.nacimiento AS alumno_nacimiento,
                            alumnos.direccion AS alumno_direccion,

                            visual_a.id AS alumno_visual_id,
                            lente_a.descripcion AS alumno_lente,
                            estrabismo_a.descripcion AS alumno_estrabismo,
                            seguimiento_a.descripcion AS alumno_seguimiento,
                            derecho_a.descripcion AS alumno_ojo_derecho,
                            derecho_a.code AS alumno_ojo_derecho_code,
                            izquierdo_a.descripcion AS alumno_ojo_izquierdo,
                            izquierdo_a.code AS alumno_ojo_izquierdo_code
                            
                            FROM alumnos

                            JOIN alumno_visual ON alumno_visual.alumno_id = alumnos.id
                            JOIN visuals visual_a ON visual_a.id = alumno_visual.visual_id

                            JOIN booleans lente_a ON lente_a.id = visual_a.lente_id
                            JOIN booleans estrabismo_a ON estrabismo_a.id = visual_a.estrabismo_id
                            JOIN booleans seguimiento_a ON seguimiento_a.id = visual_a.seguimiento_id

                            JOIN visions derecho_a ON derecho_a.id = visual_a.derecho_id
                            JOIN visions izquierdo_a ON izquierdo_a.id = visual_a.izquierdo_id");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW view_alumno_visual');
    }
}
