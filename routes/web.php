<?php
Route::get('/',function (){
    return redirect()->route('login');
});
// ----------------------------- ADMIN --------------------------------//






Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
   
    Route::resource('admin', 'Admin\AdminController');
    Route::resource('user', 'Admin\UserController');
    //Route::post('user/create/{papel}', ['as'=>'usuarios.papel.store','uses'=>'Admin\UsuarioController@papelStore']);
    Route::resource('papeis','Admin\PapelController');
    Route::get('/user/remove/{id}',  [
          'uses'=>'Admin\UserController@remover'
      ]
    )->name('user.remove');

    Route::put('user/{id}/edit', ['as'=>'user.edit','uses' => 'Admin\UserController@update']);
    Route::get('user/papel/{id}', ['as'=>'user.papel','uses'=>'Admin\UserController@papel']);
    Route::post('user/papel/{papel}', ['as'=>'user.papel.store','uses'=>'Admin\UserController@papelStore']);
    Route::delete('user/papel/{usuario}/{papel}', ['as'=>'user.papel.destroy','uses'=>'Admin\UserController@papelDestroy']);


    Route::resource('papeis', 'Admin\PapelController');

    Route::get('papeis/permissao/{id}', ['as'=>'papeis.permissao','uses'=>'Admin\PapelController@permissao']);
    Route::post('papeis/permissao/{permissao}', ['as'=>'papeis.permissao.store','uses'=>'Admin\PapelController@permissaoStore']);
    Route::delete('papeis/permissao/{papel}/{permissao}', ['as'=>'papeis.permissao.destroy','uses'=>'Admin\PapelController@permissaoDestroy']);

    
    Route::resource('cliente', 'ClienteController');
    Route::resource('pedido', 'PedidoController');

    Route::get('pedido/create/mesa/{mesa}' , 'PedidoController@createMesa');    
    Route::get('pedido/edit/{pedido}', 'PedidoController@edit')->name('pedido.edit');
    Route::put('pedido/update', 'PedidoController@update');

    Route::POST('/pedido/store', 'PedidoController@store');
    Route::delete('pedido/cancelaPedido', 'PedidoController@cancelaPedido');
    Route::get('/pedido/index', 'PedidoController@index');

    Route::get('/cliente/remove/{id}','ClienteController@remover')->name('cliente.remove');

    Route::resource('mesa','MesaController');
    Route::get('mesa/index','MesaController@index');



});

// END----------------------------- ADMIN --------------------------------END //





Auth::routes();

<<<<<<< HEAD
=======
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

>>>>>>> fca51f20b15c8ce4b63a737f5c8bcbde97218a88
