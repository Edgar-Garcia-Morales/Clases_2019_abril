<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludar_entrada', function (){
	echo "hola";
}
);

Route::get('/saludar_salida', function (){
	echo "adios";
}
);

Route::get('/saluda', 'Controlador@saludar');
Route::get('/despide', 'Controlador@despedir' );

Route::get('/saluda_ingles', 'Controlador@saludar_ingles');
Route::get('/despide_ingles', 'Controlador@despedir_ingles' );

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/saluda_italiano', 'Controlador@saludar_italiano');
Route::get('/despide_italiano', 'Controlador@despedir_italiano' );

Route::get('/carro_agregar', 'CarroController@agregar');
Route::post('/destino', 'CarroController@procesar');
Route::get('/eliminar/{id}', 'CarroController@eliminar');
Route::get('/modificar/{id}', 'CarroController@modificar');
Route::post('/destino2', 'CarroController@procesar2');
