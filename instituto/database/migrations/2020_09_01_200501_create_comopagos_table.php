<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComopagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comopagos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('tipopago_id');
            $table->foreign('tipopago_id')->references('id')->on('tipopagos');

            $table->unsignedBigInteger('recibo_id');
            $table->foreign('recibo_id')->references('id')->on('recibos');

            $table->decimal('importe');

            $table->integer('nrocomprobante');
        
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
        Schema::dropIfExists('comopagos');
    }
}
