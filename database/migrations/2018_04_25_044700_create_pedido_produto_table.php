<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoProdutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2018_04_25_044700_create_pedido_produto_table.php
=======
        Schema::create('tipos', function (Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->string('imagem');
            $table->float('valor');
            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
            $table->timestamps();
        });

>>>>>>> 9d4011a2d1b60fdc78a37a40decb005338127570:database/migrations/2018_03_12_125910_create_produtos_table.php
        Schema::create('pedido_produto', function (Blueprint $table){
            $table->integer('pedido_id')->unsigned(); // unsigned: somente inteiros positivos
            $table->integer('produto_id')->unsigned();  // unsigned: somente inteiros positivos
            
            $table->integer('quantidade');
            $table->float('valor');           

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');            
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_produto');
    }
}
