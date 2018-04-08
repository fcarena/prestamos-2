<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosAbonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('contratos_abonos', function (Blueprint $table) {
    		$table->increments('id');
    		$table->integer('contratos_codigo');
    		$table->foreign('contratos_codigo')->references('codigo')->on('contratos');
    		$table->date('fecha_renovacion');
    		$table->date('fecha_mes');
    		$table->date('fecha_final');
    		$table->integer('dias');
    		$table->decimal('total_interes');
    		$table->decimal('total_mora');
    		$table->decimal('total_pagado');
    	
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
        //
    }
}
