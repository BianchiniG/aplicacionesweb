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
});

Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth'], 'prefix' => '/admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin_home');
});
