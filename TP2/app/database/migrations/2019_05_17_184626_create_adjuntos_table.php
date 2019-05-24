<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjuntos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('nombre_archivo');
            $table->string('nombre')->default('adjunto');
            $table->timestamps();
            $table->integer('id_tramite')->unsigned();

            // Foreign Key
            $table->foreign('id_tramite')->references('id')->on('tramites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adjuntos');
    }
}
