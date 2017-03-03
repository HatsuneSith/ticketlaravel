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



/*
|--------------------------------------------------------------------------
| Testing Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/usuario/{id}', function($id){
	$name = App\tabla3::find($id);
	echo $name->nombre;
});
