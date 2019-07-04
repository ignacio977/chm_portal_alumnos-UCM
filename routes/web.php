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

#Cambiar foto#
Route::patch('/home/perfil/cambio_foto', 'HomeController@cambiar_foto');

#Estudiantes#
Route::get('/estudiante', 'EstudiantesController@index')->name('estudiante');
Route::post('/estudiante/solicitud_practicas', 'EstudiantesController@solicitud_practica')->name('solicitudpractica');
Route::get('/estudiante/practicasofertadas', 'EstudiantesController@catalogopracticas')->name('CatPag');
Route::get('/estudiante/practicasofertadas/detalle', 'EstudiantesController@practicasdetalle')->name('DetallePractica');
Route::get('/estudiante/evaluacionpractica', 'EstudiantesController@evaluacionpractica')->name('EvaluarPractica');
Route::post('/estudiante/evaluacionpractica', 'EstudiantesController@evaluacionpracticaenvio')->name('EvaluarPracticaEnvio');
Route::get('/estudiante/novedadespractica', 'EstudiantesController@novedadespractica')->name('NovedadesPractica');
Route::get('/estudiante/vistopractica', 'EstudiantesController@VistoPractica')->name('VistoPractica');

#Profesores#
Route::get('/profesor', 'ProfesoresController@index')->name('profesor');
Route::get('/profesor/mostrarpracprof', 'ProfesoresController@mostrar_practicas')->name('practicasprofesor');

#Coordinador de practicas#
Route::get('/profesor/coordinador', 'CoordinadorController@AprobarPracticas')->name('MostrarPracticas');
Route::post('/profesor/coordinador', 'CoordinadorController@CambiarEstado')->name('CambiarEstado');
Route::get('/profesor/coordinador/practicasconcluidas', 'CoordinadorController@PracticasConcluidas')->name('PracticasConcluidas');
Route::get('/profesor/coordinador/practicasconcluidasdetalle', 'CoordinadorController@PracticasConcluidasDetalle')->name('PracticasConcluidasDetalle');
Route::get('/profesor/coordinador/PracticaActual','CoordinadorController@PracticaEnCurso')->name('PracticasActuales');
#Director#
Route::get('/director', 'DirectorController@index')->name('director');

#Secretaria#
Route::get('/secretaria', 'SecretariaController@index')->name('secretaria');

#Empresa#
Route::get('/empresa', 'EmpresaController@index')->name('empresa');
Route::get('/empresa/practicas', 'EmpresaController@CreacionPracticasProfesionales');
Route::post('/empresa/practicas/carga', 'EmpresaController@VerificacionPracticaProfesional');
Route::post('/empresa/practicas/enviar', 'EmpresaController@InsercionPracticaProfesional');
Route::get('/empresa/practicas/mostrar', 'EmpresaController@MostrarPracticas');
Route::post('/empresa/practicas/mostrar', 'EmpresaController@FuncionesPracticas');
Route::get('/empresa/practicas/mostrarP', 'EmpresaController@MostrarPracticantes');
Route::post('/empresa/practicas/editar', 'EmpresaController@VerificarPracticas');
Route::get('/empresa/practicas/mostrar_finalizadas', 'EmpresaController@MostrarPracticasFinalizadas')->name('practicasfinalizadasempresa');
Route::get('/empresa/practicas/finalizadas_evaluacion', 'EmpresaController@PracticasEvaluacion')->name('practicasevaluacion');
Route::post('/empresa/practicas/evaluacionempresa', 'EmpresaController@Evaluacion')->name('evaluacionempresa');



#Coordinador de practicas#
Route::get('/profesor/coordinador', 'CoordinadorController@AprobarPracticas')->name('AprobarPracticas');
Route::post('/profesor/coordinador', 'CoordinadorController@CambiarEstado')->name('CambiarEstado');
Route::get('/profesor/coordinador/addE', 'CoordinadorController@AddEmpresa')->name('AddEmpresa');
Route::post('/profesor/coordinador/addE', 'CoordinadorController@NuevaEmpresa')->name('NuevaEmpresa');
Route::get('/profesor/practicas', 'CoordinadorController@VerPracticas')->name('VerPracticas');
Route::get('/profesor/practicas/detalle', 'CoordinadorController@DetallePracticas')->name('DetalleCoordinacionPractica');
Route::post('/profesor/EliminarPractica', 'CoordinadorController@EliminarPractica')->name('EliminarPractica');






