<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleOroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_oro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('codigo');
            $table->string('descripcion');
            $table->string('obsv');
            $table->string('cover');
            $table->string('tazacion');
            $table->float('interes');
            $table->decimal('mora');
            $table->decimal('peso_neto');
            $table->decimal('peso_bruto');
            $table->decimal('monto_calculo');
            $table->decimal('porcentaje_calculo');
            $table->float('total');
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
       Schema::drop('detalle_oro');
    }
}
