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
    return view('welcome');
});

Route::resource('almacen/categoria','CategoriaController'); // lo primero es el enlace que se usara para acceder que esta en view lo segundo es el controlador que usara esta ruta hay que hace uno para cada ruta

Route::resource('almacen/articulo','ArticuloController');

Route::resource('almacen/cliente','ClienteController');

Route::resource('almacen/producto','ProductoController');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
