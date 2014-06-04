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
Route::get('/prueba', function()
{
	return"hola mundo
<br>
	<button>
Hola esto es un <b>botón</b>
<br>"

 ;
});
// Route::Resource('tonies','ToniesController');
Route::post('users/login','UsersController@post_login');
Route::get('users/login','UsersController@get_login');
Route::get('users/logout','UsersController@get_logout');
Route::Resource('sucursals','SucursalsController');
Route::Resource('users','UsersController');
Route::Resource('cuentas','CuentasController');




