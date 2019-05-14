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

#Auth Middleware#
Auth::routes();

#Home & Index#
Route::get('/', function () {return view('home');});
Route::get('/home', 'HomeController@index')->name('home');

#Estudiantes#
Route::get('/estudiante', 'EstudiantesController@index')->name('estudiante');

#Profesores#
Route::get('/profesor', 'ProfesoresController@index')->name('profesor');

#Director#
Route::get('/director', 'DirectorController@index')->name('director');

#Secretaria#
Route::get('/secretaria', 'SecretariaController@index')->name('secretaria');

#Empresa#
Route::get('/empresa', 'EmpresaController@index')->name('empresa');