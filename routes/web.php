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

Route::get('/', function () {
    return view('home');
});


#Estudiantes#
Route::get('/Estudiante', 'EstudiantesController@index')->name('estudiante');

#Profesores#
Route::get('/Profesor', 'ProfesoresController@index')->name('profesor');

#Director#
Route::get('/Director', 'DirectorController@index')->name('director');

#Secretaria#
Route::get('/Secretaria', 'SecretariaController@index')->name('secretaria');

#Empresa#
Route::get('/Empresa', 'EmpresaController@index')->name('empresa');


Route::get('/home', 'HomeController@index')->name('home');
