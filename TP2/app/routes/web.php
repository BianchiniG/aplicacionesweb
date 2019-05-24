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

/**
 * Rutas publicas.
 */
Route::get('/', 'HomeController@index')->name('public_home');
Route::get('ver_tramite/{id}', 'TramiteController@verTramiteView');
Route::get('/tramites', 'TramiteController@all');
Route::get('/tramite/{id}', 'TramiteController@getTramite');

Route::get('/download/{file}', 'AdjuntoController@downloadFile');


/**
 * Rutas de autentificacion.
 */
Auth::routes(['register' => false]);

/**
 * Rutas que requieren estar autenticado
 */
Route::group(['middleware' => ['auth'], 'prefix' => '/admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin_home');

    Route::get('/lista_tramites', 'TramiteController@listaTramitesView');
    Route::get('/nuevo_tramite', 'TramiteController@nuevoTramiteView');
    Route::get('/editar_tramite/{id}', 'TramiteController@editarTramiteView');

    Route::get('/tramites', 'TramiteController@all');
    Route::get('/tramite/{id}', 'TramiteController@getTramite');
    Route::post('/tramite/new', 'TramiteController@createTramite');  // TODO
    Route::post('/tramite/update', 'TramiteController@updateTramite');
    Route::delete('/tramite/{id}', 'TramiteController@deleteTramite');

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
