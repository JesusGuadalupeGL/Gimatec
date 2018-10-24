<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/head', 'c_maquinas@inicio')->name('head');
Route::get('/consultamaquina', 'c_maquinas@consulta')->name('consultamaquina');

Route::get('/altaMaquina', 'c_maquinas@altaMaquina')->name('altaMaquina');
Route::POST('/guardamaquina', 'c_maquinas@guardamaquina')->name('guardamaquina');