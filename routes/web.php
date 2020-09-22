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
    return redirect()->route('login');;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::resource('temas', 'TemaController');
    //Preguntas
    Route::get('temas/{tema}/nueva_pregunta', 'PreguntaController@create')->name('preguntas.create');
    Route::post('temas/{tema}/guardar_pregunta', 'PreguntaController@store')->name('preguntas.store');
    Route::delete('temas/{tema}/{pregunta}/eliminar_pregunta', 'PreguntaController@destroy')->name('preguntas.destroy');
    Route::delete('temas/{tema}/{pregunta}/{respuesta}/eliminar_respuesta', 'RespuestaController@destroy')->name('respuesta.destroy');
    Route::get('temas/{tema}/{pregunta}', 'PreguntaController@show')->name('preguntas.show');
    Route::post('temas/{tema}/{pregunta}/guardar_respuesta', 'RespuestaController@store')->name('respuesta.store');
    Route::post('temas/{tema}/{pregunta}/{respuesta}/guardar_reputacion', 'ReputacionController@store')->name('reputacion.store');
    Route::get('mi_perfil', 'UserController@profile')->name('user.profile');
    Route::get('mis_preguntas', 'UserController@mis_preguntas')->name('user.mis_preguntas');
    Route::get('mis_respuestas', 'UserController@mis_respuestas')->name('user.mis_respuestas');
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RolController');
    Route::resource('materias', 'MateriaController');
});
