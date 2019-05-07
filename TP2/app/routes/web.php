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
    return view('index');
})->name('public_home');

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth'], 'prefix' => '/admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin_home');

    // Rutas para los tramites.
    Route::get('/tramites', 'TramiteController@all');
    Route::get('/tramite/{id}', 'TramiteController@getTramite');
    Route::post('/tramite/new', 'TramiteController@create');
    Route::post('/tramite/update', 'TramiteController@update');
    Route::delete('/tramite/{id}', 'TramiteController@delete');

    
});
