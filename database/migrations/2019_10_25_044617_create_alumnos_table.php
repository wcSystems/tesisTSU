<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('escolar');
            $table->string('cedula');
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('sexo_id')->unsigned();
            $table->string('telefono');
            $table->date('nacimiento');
            $table->string('direccion');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sexo_id')->references('id')->on('sexos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
