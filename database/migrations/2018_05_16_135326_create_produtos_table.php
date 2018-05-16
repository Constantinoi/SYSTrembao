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
            $table->string('descricao')->nullable();
            $table->string('imagem');
            $table->float('valor');
            
            $table->integer('produto_status_id')->nullable();
            $table->integer('tipo_produto_id')->unsigned();

            $table->foreign('tipo_produto_id')->references('id')->on('tipo_produto')->onDelete('cascade');
            $table->foreign('produto_status_id')->references('id')->on('produto_status')->onDelete('cascade');

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
        Schema::dropIfExists('produtos');
    }
}
