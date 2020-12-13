<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('dni_id');
            $table->integer('dni')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo');
            $table->date('fechanacimiento');
            $table->string('cuil')->nullable();
            $table->unsignedBigInteger('localidad_id');
            $table->string('direccion');
            $table->string('numero');
            $table->string('telefono');
            $table->string('correo');
           
            $table->boolean('activo');
                       
                 
            
            $table->foreign('localidad_id')->references('id')->on('localidades');

            
            $table->foreign('dni_id')->references('id')->on('documentos');


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
        Schema::dropIfExists('personas');
    }
}
