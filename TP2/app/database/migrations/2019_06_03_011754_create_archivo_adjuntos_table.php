<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivoAdjuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archivo_adjuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->default('archivo_adjunto');
            $table->text('path');
            $table->text('tipo');
            $table->integer('id_adjunto')->unsigned();

            // Foreign Key
            $table->foreign('id_adjunto')->references('id')->on('adjuntos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archivo_adjuntos');
    }
}
