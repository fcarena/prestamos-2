<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajaIngresos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('caja_ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contratos_codigo');
            $table->string('tipo_movimiento');
             $table->string('tiendas_id');
            $table->float('monto');
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
        Schema::drop('caja_ingresos');
    }
}
