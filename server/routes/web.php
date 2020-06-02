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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'StoreController@index')->name('store');
Route::get('/perfil', 'PerfisController@show')->name('perfil');
Route::put('/perfil/{id}', 'UsersController@update')->name('editPerfil');
Route::group(['middleware' => ['admin']], function () {
    Route::get('config', 'PerfisController@users')->name('config');
    Route::put('change-admin/{id}', 'UsersController@changeAdmin')->name('change-admin');
});
