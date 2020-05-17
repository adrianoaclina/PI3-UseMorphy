<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@show');
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth','admin'])->group(function(){
    Route::resource('products', 'ProductsController');
    Route::resource('categories', 'CategoriesController');
    Route::get('/cadastros', 'CadastrosController@index');
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::put('users/{user}/change-admin', 'UsersController@changeAdmin')->name('users.change-admin');
});

Route::middleware(['auth'])->group(function(){
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
});