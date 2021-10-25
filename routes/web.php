<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PreguntaController;

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

Route::get('/','App\Http\Controllers\JuegoController@index')->name('home');


Route::resource('preguntas',PreguntaController::class);
Route::get('historico', 'App\Http\Controllers\JuegoController@historico')->name('historico'); 

Route::post('start', 'App\Http\Controllers\JuegoController@iniciarJuego')->name('iniciar');
Route::get('ronda/{id}', 'App\Http\Controllers\JuegoController@crearRonda')->name('crear.ronda'); 

Route::post('responder', 'App\Http\Controllers\JuegoController@responder')->name('responder');


Route::get('salir', 'App\Http\Controllers\JuegoController@salirJuego')->name('salir.juego'); 