<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Insertar registros
    	DB::table('users')->insert(array(
    			'name'  			=> 'Administrador',
    			'email'     		=> 'admin@gmail.com',
    			'password'  		=>  Hash::make('123456')
    	));
    }
}
