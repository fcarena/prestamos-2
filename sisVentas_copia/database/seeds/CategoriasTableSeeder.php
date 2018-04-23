<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /// Insertar registros
    	DB::table('categorias')->insert(array([
    			'nombre'  		=> 'Oro',
    			'descripcion'   => 'Prendas de Oro',
    			'interes'  		=>  12,
    			'mora'  		=>  0
    	],
    	[
    			'nombre'  		=> 'Electrodomestio Grande',
    			'descripcion'   => 'Electrodomesticos',
    			'interes'  		=>  25,
    			'mora'  		=>  0
    	],
		[
    			'nombre'  		=> 'Electrodomestio Pequeño',
    			'descripcion'   => 'Electrodomesticos',
    			'interes'  		=>  18,
    			'mora'  		=>  0
    	]
    			
    	));
    }
}
