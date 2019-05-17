<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHipervinculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hipervinculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('url');
            $table->string('nombre')->default('hipervinculo');
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
        Schema::dropIfExists('hipervinculos');
    }
}
