<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepresentantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cedula');
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('sexo_id')->unsigned();
            $table->string('telefono');
            $table->date('nacimiento');
            $table->string('direccion');
            $table->bigInteger('trabajo_id')->unsigned();
            $table->bigInteger('parentesco_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sexo_id')->references('id')->on('sexos');
            $table->foreign('trabajo_id')->references('id')->on('trabajos');
            $table->foreign('parentesco_id')->references('id')->on('parentescos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representantes');
    }
}
