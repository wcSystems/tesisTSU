<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlumnoAmtropometria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumno_amtropometria', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('alumno_id')->unsigned();
            $table->bigInteger('amtropometria_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('alumno_id')->references('id')->on('alumnos');
            $table->foreign('amtropometria_id')->references('id')->on('amtropometrias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumno_amtropometria');
    }
}
