<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratosVitrinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos_vitrinas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contratos_codigo');
            $table->date('fecha_inicial_vitrina');
            $table->date('fecha_final_vitrina');
            $table->integer('dias');
            $table->decimal('tazacion');
            $table->decimal('total_valor');
            
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
        Schema::drop('contratos_vitrinas');
    }
}
