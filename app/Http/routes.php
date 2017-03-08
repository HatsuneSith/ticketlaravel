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
Route::get('/newticket', 'HomeController@nuevo');
Route::post('/guardarProyecto', 'HomeController@agregar_ticket');


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


