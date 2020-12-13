<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscripcionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripciones', function (Blueprint $table) {
            
            $table->id();

            //no se hace asi esta tabla corregi es una tabla pivot!!
            // por eso te tira error cuando ejecutas migrate
            $table->unsignedBigInteger('cursada_id');
            $table->unsignedBigInteger('alumno_id');

            $table->foreign('cursada_id')->references('id')->on('cursadas'); 

            $table->foreign('alumno_id')->references('id')->on('alumnos'); 

            $table->date('fecha');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscripciones');
    }
}
