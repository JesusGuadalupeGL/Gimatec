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

Route::resource('cliente','ControlladorCliente@create');
Route::post('altacliente','ControlladorCliente@store')->name('altacliente');
Route::get('/eliminac/{idcli}','ControlladorCliente@eliminac')->name('eliminac');
Route::get('/modificacliente/{idcli}','ControlladorCliente@modificacliente')->name('modificacliente');
Route::post('editacliente','ControlladorCliente@editacliente')->name('editacliente');
Route::get('reportecliente','ControlladorCliente@reportecliente')->name('reportecliente');
Route::get('/restaurac/{idcli}','ControlladorCliente@restaurac')->name('reestaurac');


Route::resource('usuario','ControlladorUsuario@create');
Route::POST('altausuario','ControlladorUsuario@store')->name('altausuario');
Route::get('reporteusu','ControlladorUsuario@reporteusu')->name('reporteusu');
Route::get('/eliminau/{idu}','ControlladorUsuario@eliminau')->name('eliminau');
Route::get('/modificausuario/{idu}','ControlladorUsuario@modificausuario')->name('modificausuario');
Route::post('editausuario','ControlladorUsuario@editausuario')->name('editausuario');
Route::get('/restaurau/{idu}','ControlladorUsario@restaurau')->name('reestaurau');

Route::resource('servicio','ControladorServicio@create');
Route::post('altaservicio','ControladorServicio@store')->name('altaservicio');
Route::get('reporteser','ControladorServicio@reporteser')->name('reporteser');


Route::resource('reporte','ControladorReporte@create');
Route::post('altareporte','ControladorReporte@store')->name('altareporte');
Route::get('reportedetalle','ControladorReporte@reportedetalle')->name('reportedetalle');

	