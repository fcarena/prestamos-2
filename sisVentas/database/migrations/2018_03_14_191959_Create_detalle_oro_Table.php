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
            $table->string('peso');
            $table->string('cover');
            $table->string('tazacion');
            $table->decimal('interes');
            $table->decimal('mora');
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
       Schema::drop('detalle_oro');
    }
}
