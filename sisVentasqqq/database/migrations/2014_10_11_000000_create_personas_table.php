<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('tipo_dni');
            $table->integer('dni');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono1');
            $table->string('telefono2');
            $table->string('distrito');
            $table->string('direccion');
            $table->string('correo')->unique();
            $table->string('cactado');
            $table->string('categoria');
            $table->string('fecha');
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('personas');
    }
}
