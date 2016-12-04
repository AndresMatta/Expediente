<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Usuarios
Route::get('/api/users', 'UsuarioController@getUsers');
Route::post('/api/users', 'UsuarioController@store');
Route::resource('users', 'UsuarioController');
Route::delete('api/users/{id}', 'UsuarioController@destroy');


Route::get('api/paciente/{cedula}', 'PacienteController@getPaciente');
Route::resource('pacientes', 'PacienteController');
Route::post('api/consulta/{cedula}', 'PacienteController@IniciarConsulta');

//Rutas para controladores resources
Route::resource('consultas', 'ConsultaController');
Route::get('recepcion', 'ConsultaController@recepcion');
Route::get('consultas/pendientes/{estado}', 'ConsultaController@getConsultasEnEspera');
Route::get('consultas/atencion/{id}' , 'ConsultaController@atencion');



