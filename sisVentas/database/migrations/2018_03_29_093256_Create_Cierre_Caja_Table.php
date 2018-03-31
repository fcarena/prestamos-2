<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCierreCajaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('Cierre_Caja', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contratos_codigo');
            $table->string('tipo_movimiento');
            $table->string('tiendas_id');
            $table->float('ingresos');
             $table->float('egresos');
            $table->float('capital');
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
         Schema::drop('Cierre_Caja');
    }
}
