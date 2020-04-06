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
    return view('login');
});

Auth::routes();

//Rutas Base
Route::get('/', 'HomeController@index')->name('home');
Route::get("/logout", "SesionController@logout");

//Consultas
Route::get("/Consultas","ConsultasController@index");

//Default para que al recargar no se rompa
Route::get('/{any}', 'HomeController@index')->name('home');

//Resources
Route::resource("/users","UserController");
Route::resource("/Roles","RoleController");
Route::resource("/alumnoNuevo","AlumnoController");