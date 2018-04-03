<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo')->unique();
            $table->integer('dni');
            $table->integer('tiendas_id')->unsigned();
            $table->foreign('tiendas_id')->references('id')->on('tiendas');
            $table->date('fecha_inicio');
            $table->date('fecha_mes');
            $table->date('fecha_final');
            $table->integer('categorias_id')->unsigned();
            $table->foreign('categorias_id')->references('id')->on('categorias');
            $table->string('estatus');
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
        Schema::drop('contratos');
    }
}
