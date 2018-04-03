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

<<<<<<< HEAD
Route::POST('/pedido/store', 'PedidoController@store');
Route::delete('pedido/destroy/all', 'PedidoController@destroyAll');
Route::get('/pedido/index', 'PedidoController@index');
=======
Route::get('/cliente/remove/{id}','ClienteController@remover')->name('cliente.remove');
Route::resource('cliente', 'ClienteController');
>>>>>>> 629b23f31d1d4e2ab13e03a36f6665255901c87c
