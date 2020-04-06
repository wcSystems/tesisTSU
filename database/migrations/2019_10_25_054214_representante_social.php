<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RepresentanteSocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('representante_social', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('representante_id')->unsigned();
            $table->bigInteger('social_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('representante_id')->references('id')->on('representantes');
            $table->foreign('social_id')->references('id')->on('socials');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('representante_social');
    }
}
