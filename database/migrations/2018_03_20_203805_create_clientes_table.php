<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         
        
         Schema::create('enderecos', function (Blueprint $table){
            $table->increments('id');
            $table->string('cep');
            $table->string('bairro');
            $table->string('logradouro');
            $table->integer('num');
            $table->string('complemento');
            $table->timestamps();
        });
        Schema::create('clientes', function (Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('data_nascimento');
            $table->string('telefone_1');
            $table->string('telefone_2');
            $table->string('observacao')->nullable();
            $table->integer('endereco_id')->unsigned();
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('cascade');
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
         
         Schema::dropIfExists('clientes');
         Schema::dropIfExists('enderecos');
    }
}
