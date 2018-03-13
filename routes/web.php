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
    return view('welcome');
});



Route::get('pedidos/create','PedidoController@create')->name('pedidos.create');
Route::post('pedidos/produto/{produto}', ['as'=>'pedidos.produto.store','uses'=>'PedidoController@produtoStore']);
Route::delete('/pedidos/produto/{pedido}/{produto}', ['as'=>'pedidos.produto.destroy','uses'=>'PedidoController@produtoDestroy']);
