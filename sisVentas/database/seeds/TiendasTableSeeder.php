<?php

use Illuminate\Database\Seeder;

class TiendasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Insertar registros
    	DB::table('tiendas')->insert(array(
    			'nombre'  	=> 'Tienda 01',
    			'letrae'    => 'E',
    			'letrao'  	=>  'O'
    	));
    }
}
