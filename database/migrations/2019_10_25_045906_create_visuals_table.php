<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visuals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('lente_id')->unsigned();
            $table->bigInteger('derecho_id')->unsigned();
            $table->bigInteger('izquierdo_id')->unsigned();
            $table->bigInteger('estrabismo_id')->unsigned();
            $table->bigInteger('seguimiento_id')->unsigned();
            $table->string('observacion');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('lente_id')->references('id')->on('booleans');
            $table->foreign('derecho_id')->references('id')->on('visions');
            $table->foreign('izquierdo_id')->references('id')->on('visions');
            $table->foreign('estrabismo_id')->references('id')->on('booleans');
            $table->foreign('seguimiento_id')->references('id')->on('booleans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visuals');
    }
}
