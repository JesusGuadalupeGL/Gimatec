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

//rupas del catalogo cliente
Route::get('/altacliente','sistema@altacliente');
Route::POST('/guardacliente','sistema@guardacliente')->name('guardacliente');
Route::get('/reportecliente','sistema@reportecliente')->name('reportecliente');
//rutas del catalogo usuarios
Route::get('/altausuario','sistema@altausuario')->name('altausuario');
Route::POST('/guardausuario','sistema@guardausuario')->name('guardausuario');
Route::get('/reporteusu','sistema@reporteusu');
/*
Route::get('/eliminam/{idm}','sistema@eliminam')->name('eliminam');
Route::get('/modificaam/{idm}','sistema@modificam')->name('modificam');

Route::POST('/guardaedicionm','sistema@guardaedicionm')->name('guardaedicionm');

*/
Route::get('/altaservicio','sistema@altaservicio')->name('altaservicio');
Route::POST('/guardaservicio','sistema@guardaservicio')->name('guardaservicio');
Route::get('/reporteser','sistema@reporteser');
Route::get('/altadetalle','sistema@altadetalle');
Route::POST('/guardadetalle','sistema@guardadetalle')->name('guardadetalle');
Route::get('/reportedetalle','sistema@reportedetalle');
