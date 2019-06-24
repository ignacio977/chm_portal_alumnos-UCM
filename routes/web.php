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


#Profesores#
Route::get('/profesor', 'ProfesoresController@index')->name('profesor');
Route::get('/profesores_reserva', function () {
        return view('Profesores.reserva');
});
Route::post('/agregar_reserva_profesores', 'ProfesoresController@agregar_reserva');
Route::get('/profesores_listado_reservas', 'ProfesoresController@listado_reservas')->name('Prof_listado_reservas');

Route::get('profesor_comentario/{id}/destroy',[
    'uses' => 'ProfesoresController@destroycomentario',
    'as'   => 'profesor_comentario.destroy']
);

#Coordinador de practicas#
Route::get('/profesor/coordinador', 'CoordinadorController@AprobarPracticas')->name('MostrarPracticas');
Route::post('/profesor/coordinador', 'CoordinadorController@CambiarEstado')->name('CambiarEstado');


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
Route::get('/secretaria_buscar_disponibilidad', function () {
        return view('Secretaria.buscar_disponibilidad');
});
Route::get('/secretaria_reportes', function () {
        return view('Secretaria.generar_reportes');
});
Route::get('secretaria_listado_reservas/{id}/destroy',[
    'uses' => 'SecretariaController@destroy',
    'as'   => 'secretaria_listado_reservas.destroy']
);

Route::get('secretaria_listado_reservas/reporte',[
    'uses' => 'SecretariaController@reportes_reservas',
    'as'   => 'secretaria_listado_reservas.reportes_reservas']
);
Route::get('secretaria_historial_sala/{id}/historial',[
    'uses' => 'SecretariaController@historial_sala',
    'as'   => 'secretaria_historial_sala.historial_sala']
);
Route::get('secretaria_exportar_historial/{id}/exportar',[
    'uses' => 'SecretariaController@exportar_sala',
    'as'   => 'secretaria_exportar_historial.exportar_sala']
);

Route::get('secretaria_listado_reserva/{id}/destroy',[
    'uses' => 'SecretariaController@destroy_confirmar_reserva',
    'as'   => 'secretaria_listado_reserva.destroy']
);
Route::get('secretaria_listado_reservas/{id}/edit',[
    'uses' => 'SecretariaController@edit',
    'as'   => 'secretaria_listado_reservas.edit']
);
Route::get('secretaria_notificacion/{id}/notificacion',[
    'uses' => 'SecretariaController@notificacion',
    'as'   => 'secretaria_notificacion.notificacion']
);
Route::get('secretaria_listado_reserva/{id}/edit',[
    'uses' => 'SecretariaController@edit_reserva',
    'as'   => 'secretaria_listado_reserva.edit']
);
Route::post('secretaria_listado_reservas/{id}/update',[
    'uses' => 'SecretariaController@update',
    'as'   => 'secretaria_listado_reservas.update']
);
Route::get('secretaria_listado_salas/{id}/destroy',[
    'uses' => 'SecretariaController@destroysala',
    'as'   => 'secretaria_listado_salas.destroy']
);
Route::get('lista_reserva/{id}',['as' => 'lista_reserva.show', 'uses' => 'SecretariaController@show']);
Route::get('/secretaria_listado_reservas', 'SecretariaController@listado_reservas')->name('listado_reservas');
Route::get('/secretaria_listado_salas', 'SecretariaController@listado_salas')->name('listado_salas');
Route::get('/secretaria_confirmar_listado_reservas', 'SecretariaController@confirmar_listado_reservas')->name('confirmar_listado_reservas');
Route::post('/agregar_sala', 'SecretariaController@agregar_sala');
Route::post('/buscar_disponibilidad', 'SecretariaController@buscar_disponibilidad');
Route::post('/agregar_reserva_secretaria', 'SecretariaController@agregar_reserva');
Route::post('/agregar_comentario', 'SecretariaController@comentario');
Route::get('reserva/{id}/{fi}/{ff}/{nombre}/{capacidad}/{dia_semana}',['as' => 'Secretaria.show2', 'uses' => 'SecretariaController@show2']);


#Empresa#
Route::get('/empresa', 'EmpresaController@index')->name('empresa');
Route::get('/empresa/practicas', 'EmpresaController@CreacionPracticasProfesionales');
Route::post('/empresa/practicas/carga', 'EmpresaController@VerificacionPracticaProfesional');
Route::post('/empresa/practicas/enviar', 'EmpresaController@InsercionPracticaProfesional');
Route::get('/empresa/practicas/mostrar', 'EmpresaController@MostrarPracticas');
Route::post('/empresa/practicas/mostrar', 'EmpresaController@EliminarPracticas');
Route::post('/empresa/practicas/editar', 'EmpresaController@VerificarPracticas');
