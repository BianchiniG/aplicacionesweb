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

Route::get('/download/{id_tramite}/{file}', 'AdjuntoController@downloadFile');


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
    Route::get('/tramite/{id}', 'TramiteController@getTramite');
    Route::get('/tramites', 'TramiteController@all');

    Route::get('/nuevo_tramite', 'TramiteController@nuevoTramiteView');
    Route::post('/nuevo_tramite/crear', 'TramiteController@create');

    Route::get('/editar_tramite/{id}', 'TramiteController@editarTramiteView');
    Route::post('/editar_tramite/actualizar', 'TramiteController@updateTramite');

    Route::delete('/tramite/{id}', 'TramiteController@delete');

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
