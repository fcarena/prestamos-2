<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_detalles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contratos_codigo');
            $table->foreign('contratos_codigo')->references('codigo')->on('contratos');
            $table->string('descripcion');
            $table->string('marca');
            $table->string('modelo');
            $table->string('serial');
            $table->string('obsv');
            $table->string('cover');
            $table->decimal('tazacion');
            $table->decimal('interes');
            $table->decimal('subtotal');
            $table->decimal('total');
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
        Schema::drop('contratos_detalles');
    }
}
