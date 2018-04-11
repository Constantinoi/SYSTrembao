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

Route::get('/','PedidoController@welcome');

Route::resource('cliente', 'ClienteController');
Route::resource('pedido', 'PedidoController');


Route::get('pedido/edit/{pedido}', 'PedidoController@edit')->name('pedido.edit');
Route::put('pedido/update', 'PedidoController@update');


Route::POST('/pedido/store', 'PedidoController@store');
Route::delete('pedido/destroy/all', 'PedidoController@destroyAll');
Route::get('/pedido/index', 'PedidoController@index');

Route::get('/cliente/remove/{id}','ClienteController@remover')->name('cliente.remove');
Route::resource('cliente', 'ClienteController');


Route::resource('produto', 'ProdutoController');
Route::POST('addPost','PostController@addPost');
Route::POST('editPost','PostController@editPost');

