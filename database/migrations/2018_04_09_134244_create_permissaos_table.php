<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('descricao')->nullable();
            $table->timestamps();
        });

        Schema::create('papel_permissao', function (Blueprint $table){
            $table->integer('permissao_id')->unsigned();
            $table->integer('papel_id')->unsigned();

            $table->foreign('permissao_id')->references('id')->on('permissoes')->onDelete('cascade');
            $table->foreign('papel_id')->references('id')->on('papeis')->onDelete('cascade');

            $table->primary(['permissao_id','papel_id']);
        });

        Schema::create('papel_user', function (Blueprint $table){
            $table->integer('papel_id')->unsigned();
            $table->integer('user_id')->unsigned();
           
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('papel_id')->references('id')->on('papeis')->onDelete('cascade');
//
            $table->primary(['user_id','papel_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('papel_user');
        Schema::dropIfExists('papel_permissao');        
        Schema::dropIfExists('permissoes');
    }
}
