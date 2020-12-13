<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuotas', function (Blueprint $table) {
            $table->id();

//Montos de las cuotas
            $table->decimal('inscripcion')->nullable();
            $table->decimal('descuento')->nullable();
            $table->decimal('intereses')->nullable();
            
            for ($i=1; $i <= 12; $i++) { 
                $table->decimal($i)->nullable();
                $table->date('vto_'.$i)->nullable();
            }

/*
            $table->decimal('enero')->nullable();
            $table->decimal('febrero')->nullable();
            $table->decimal('marzo')->nullable();
            $table->decimal('abril')->nullable();
            $table->decimal('mayo')->nullable();
            $table->decimal('junio')->nullable();
            $table->decimal('julio')->nullable();
            $table->decimal('agosto')->nullable();
            $table->decimal('septiembre')->nullable();
            $table->decimal('octubre')->nullable();
            $table->decimal('noviembre')->nullable();
            $table->decimal('diciembre')->nullable();
//Montos de las cuotas
//Fechas de vencimiento
            $table->date('mes1')->nullable();
            $table->date('mes2')->nullable();
            $table->date('mes3')->nullable();
            $table->date('mes4')->nullable();
            $table->date('mes5')->nullable();
            $table->date('mes6')->nullable();
            $table->date('mes7')->nullable();
            $table->date('mes8')->nullable();
            $table->date('mes9')->nullable();
            $table->date('mes10')->nullable();
            $table->date('mes11')->nullable();
            $table->date('mes12')->nullable();
            */
//Fechas de vencimiento

            $table->unsignedBigInteger('anio_id');
            $table->foreign('anio_id')->references('id')->on('anios')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->unsignedBigInteger('oferta_id');
            $table->foreign('oferta_id')->references('id')->on('ofertas')
            ->onDelete('cascade')
            ->onUpdate('cascade'); 

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
        Schema::dropIfExists('cuotas');
    }
}
