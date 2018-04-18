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
        Schema::create('mesas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numero_pedido')->unsigned();
            $table->string('status');
            $table->float('valor_total')->default(0);
            $table->string('observacao')->nullable();
            $table->integer('mesa_id')->unsigned();

            $table->foreign('mesa_id')->references('id')->on('mesas')->onDelete('cascade');


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
        Schema::dropIfExists('mesas');
    }
}
