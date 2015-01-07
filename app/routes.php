<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::get('/login', 'usuarioController@login');
Route::post('/login', 'usuarioController@login');


Route::get('/crearUsuario', 'usuarioController@crearUsuario');
Route::post('/crearUsuario', 'usuarioController@crearUsuario');

Route::get('/configuracionCuenta', 'usuarioController@configuracionCuenta');
Route::post('/configuracionCuenta', 'usuarioController@configuracionCuenta');


Event::listen('illuminate.query', function() {
    //print_r(func_get_args());
});