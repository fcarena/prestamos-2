<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('almacen/categoria','CategoriaController');
Route::resource('consultas/categorias','CategoriaController@indexx');
Route::resource('almacen/persona','PersonaControllers');
Route::resource('consultas/personas','PersonaControllers@indexx');
Route::resource('seguridad/usuario','UsuarioController');
Route::resource('almacen/articulos','ArticulosController');
Route::resource('consultas/articulos','ArticulosController@indexx');
Route::resource('almacen/tienda','TiendaController');
Route::resource('consultas/tiendas','TiendaController@indexx');
Route::resource('contrato/nuevo','ContratoController');
Route::resource('contrato/oro','OroController');
Route::resource('contrato/carro','CarroController');
Route::resource('reportes/tiendas','PDFTiendaController');
Route::resource('detalles/nuevo','DetalleContratoController');
Route::resource('detalles/renovacion','RenovacionController');




Route::resource('vendor/autoload.php','ContratoController');
Route::auth();
Route::get('/{slug?}', 'HomeController@index');

Route::get('/home', 'HomeController@index');
