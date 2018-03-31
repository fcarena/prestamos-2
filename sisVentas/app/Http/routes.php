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


Route::resource('caja/egresos','CajaEgresosController');
Route::resource('caja/ingresos','CajaIngresosController');
Route::resource('caja/cierre','CierreCajaController');


Route::resource('almacen/categoria','CategoriaController');


Route::get('almacen/persona','PersonaControllers@index');
Route::get('almacen/persona/create','PersonaControllers@create');
Route::post('almacen/persona','PersonaControllers@store');
Route::get('almacen/persona/{id}','PersonaControllers@edit')->name('almacen.persona');
Route::post	('almacen/persona/{id}','PersonaControllers@update')->name('almacen.persona');
//Route::post('almacen/persona','PersonaControllers@destroy');


Route::resource('seguridad/usuario','UsuarioController');

Route::resource('almacen/articulos','ArticulosController');


Route::resource('almacen/tienda','TiendaController');


Route::get('contrato','ContratoController@index');
Route::get('contrato/nuevo','ContratoController@create');
Route::post('contrato/nuevo','ContratoController@store');
Route::get('contrato/renovacion/{id}','RenovacionController@edit')->name('contrato/renovacion/');
Route::post('contrato/renovacion','RenovacionController@store')->name('contrato.renovacion');



Route::resource('contrato/oro','OroController');
Route::get('detalles_contrato/renovacion_oro/{id}','RenovacionOroController@edit')->name('detalles_contrato/renovacion_oro/');
Route::post('detalles/renovacion_oro/','RenovacionOroController@store')->name('detalles.renovacion_oro');
Route::get('detalles_contrato/vista_oro/{id}','OroController@show')->name('detalles_contrato/vista_oro/');



Route::resource('contrato/carro','CarroController');


Route::resource('reportes/tiendas','PDFTiendaController');
Route::resource('detalles/nuevo','DetalleContratoController');





Route::resource('vendor/autoload.php','ContratoController');
Route::auth();
Route::get('/{slug?}', 'HomeController@index');

Route::get('/home', 'HomeController@index');
