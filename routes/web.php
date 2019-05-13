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

Auth::routes();

Route::get('/', function () {return view('home');});

#Estudiantes#
Route::get('/estudiante', 'EstudiantesController@index');

#Profesores#
Route::get('/profesor', 'ProfesoresController@index');

#Director#
Route::get('/director', 'DirectorController@index');

#Secretaria#
Route::get('/secretaria', 'SecretariaController@index');

#Empresa#
Route::get('/empresa', 'EmpresaController@index');


Route::get('/home', 'HomeController@index')->name('home');
