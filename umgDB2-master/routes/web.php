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
//Aquí se pueden crear nuevas rutas

Route::get('/', 'Auth\LoginController@showLoginForm');

Route::get ('dashboard','controllerUmg@index');

Route::get('recuperacion','controllerUmg@showRecuperacion')->name('recuperacion');
Route::get('conection','controllerUmg@getDatabases');
Route::post('tables','controllerUmg@getTables');
Route::post('culmnas','controllerUmg@getColumns');
Route::post('ejecutarSQL','controllerUmg@ejecutarSQL');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Creados
Route::get('manipulacion','controllerUmg@getDml')->name("manipulacion");
Route::post('manipulacion','controllerUmg@dml');
Route::get('grupo','controllerUmg@grupo');
Route::get('TCL','controllerUmg@TCL');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
