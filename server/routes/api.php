<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'morphy'], function () {
    Route::get('/produtos','ProdutosController@index');
    Route::get('/produtos/{id}','ProdutosController@show');
    Route::post('/produtos','ProdutosController@store');
    Route::put('/produtos/{id}','ProdutosController@update');
    Route::delete('/produtos/{id}','ProdutosController@destroy');
    Route::get('/tags','TagsController@index');
    Route::post('/tags','TagsController@store');
    Route::put('/tags/{id}','TagsController@update');
    Route::delete('/tags/{id}','TagsController@destroy');
    Route::get('/categorias','CategoriasController@index');
    Route::get('/categorias/{id}','CategoriasController@show');
    Route::post('/categorias','CategoriasController@store');
    Route::put('/categorias/{id}','CategoriasController@update');
    Route::delete('/categorias/{id}','CategoriasController@destroy');
    Route::put('/users/{id}', 'UsersController@update');
    Route::post('/users/{id}','UsersController@changeAdmin');
});