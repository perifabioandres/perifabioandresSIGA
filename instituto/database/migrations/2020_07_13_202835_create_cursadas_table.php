<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursadas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('anio_id');
            $table->foreign('anio_id')->references('id')->on('anios');

            $table->unsignedBigInteger('oferta_id');
            $table->foreign('oferta_id')->references('id')->on('ofertas'); 

            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos'); 

            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisiones'); 

            $table->unsignedBigInteger('turno_id');
            $table->foreign('turno_id')->references('id')->on('turnos'); 

            $table->integer('plazas');
            
            $table->integer('plazas_ocupadas')->nullable();


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
        Schema::dropIfExists('cursadas');
    }
}
