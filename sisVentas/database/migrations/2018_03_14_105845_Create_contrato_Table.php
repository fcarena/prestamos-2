<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('contrato', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo');
            $table->integer('dni');
            $table->string('nombre');
            $table->string('tienda');
            $table->string('fecha_inicio');
            $table->string('fecha_mes');
            $table->string('fecha_final');
            $table->string('categoria');
            $table->string('estatus');
            $table->integer('cantida');
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
        Schema::drop('contrato');
    }
}
