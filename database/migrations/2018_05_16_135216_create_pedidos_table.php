<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_pedido')->unsigned();
            $table->string('observacao')->nullable();            
            $table->float('valor_total')->default(0);

            $table->integer('mesa_id')->unsigned();
            $table->integer('cliente_id')->unsigned();
            $table->integer('pedido_status_id')->unsigned();            
            $table->integer('tipo_pedido_id')->unsigned();

            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('pedido_status_id')->references('id')->on('pedido_status')->onDelete('cascade');
            $table->foreign('tipo_pedido_id')->references('id')->on('tipo_pedido')->onDelete('cascade');

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
        Schema::dropIfExists('pedidos');
    }
}
