<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao');
            $table->float('valor');
            $table->timestamps();
        });

        Schema::create('pedidos_produtos', function (Blueprint $table){
            $table->increments('id');
            $table->integer('pedido_id')->unsigned(); // unsigned: somente inteiros positivos
            $table->integer('produto_id')->unsigned();  // unsigned: somente inteiros positivos
           // unsigned: somente inteiros positivos
            $table->timestamps();
            
            $table->integer('quantidade');
            $table->float('valor');
           

            $table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos_produtos');
        Schema::dropIfExists('produtos');
    }
}
