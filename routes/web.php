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
Route::get('/secretaria_reserva', function () {
        return view('Secretaria.reserva');
});
Route::get('/secretaria_agregar_sala', function () {
        return view('Secretaria.agregar_sala');
});
Route::get('secretaria_listado_reservas/{id}/destroy',[
    'uses' => 'SecretariaController@destroy',
    'as'   => 'secretaria_listado_reservas.destroy']
);
Route::get('lista_reserva/{id}',['as' => 'lista_reserva.show', 'uses' => 'SecretariaController@show']);
Route::get('/secretaria_listado_reservas', 'SecretariaController@listado_reservas')->name('listado_reservas');
Route::post('/agregar_sala', 'SecretariaController@agregar_sala');
Route::post('/agregar_reserva_secretaria', 'SecretariaController@agregar_reserva');

#Empresa#
Route::get('/empresa', 'EmpresaController@index')->name('empresa');
