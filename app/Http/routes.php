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
    return view('inicio');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/nuevo_ticket', 'HomeController@nuevo');
Route::post('/agregar_ticket', 'HomeController@agregar_ticket');
Route::post('/agregar_respuesta', 'HomeController@agregar_respuesta');
Route::get('/lista', 'HomeController@lista_ticket');
Route::get('/seguir', 'HomeController@seguir_ticket');
Route::get('/eliminar_ticket/{id}', 'HomeController@eliminar_ticket');
Route::get('/responder/{id}', 'HomeController@responder_ticket');



/*
|--------------------------------------------------------------------------
| Testing Routes
|--------------------------------------------------------------------------
|
|
*/


Route::get('/usuario/{id}', function($id){
	$varname = App\user::find($id);
	echo $varname;
});


