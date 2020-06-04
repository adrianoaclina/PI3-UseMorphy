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
Route::get('/search/categoria/{categoria}', 'StoreController@buscaCategoria')->name('search-categoria');
Route::get('/search/tag/{tag}', 'StoreController@buscaTag')->name('search-tag');
Route::get('/search/produto/', 'StoreController@buscaProduto')->name('search-produto');
Route::get('produtos/{id}/show', 'ProdutosController@show')->name('produtos.show');

Route::middleware(['auth','admin'])->group(function () {
    Route::get('config', 'PerfisController@users')->name('config');
    Route::put('change-admin/{id}', 'UsersController@changeAdmin')->name('change-admin');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('categorias', 'CategoriasController');
    Route::resource('produtos', 'ProdutosController');
    Route::resource('tags', 'TagsController');
    
});

Route::middleware(['auth'])->group(function(){
    Route::get('/carrinho', 'CarrinhosController@index')->name('carrinho');
    Route::get('/carrinho/{id}/store', 'CarrinhosController@store')->name('carrinho-store');
    Route::get('/carrinho/{produto}/remove', 'CarrinhosController@destroy')->name('carrinho-remove');
    Route::get('/perfil', 'PerfisController@show')->name('perfil');
    Route::put('/perfil/{id}', 'UsersController@update')->name('editPerfil');
    Route::post('/pedido/store', 'PedidosController@store')->name('pedido-store');
    Route::get('/pedidos', 'PedidosController@index')->name('pedidos');
    Route::put('/pedidos/{id}', 'PedidosController@cancel')->name('pedido-cancel');
});

