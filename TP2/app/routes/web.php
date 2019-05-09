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
Route::get('/tramites', 'TramiteController@all');
Route::get('/tramite/{id}', 'TramiteController@getTramite');

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
    Route::post('/tramite/new', 'TramiteController@create');
    Route::post('/tramite/update', 'TramiteController@update');
    Route::delete('/tramite/{id}', 'TramiteController@delete');

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});
