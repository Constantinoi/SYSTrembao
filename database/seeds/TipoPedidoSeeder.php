<?php

use Illuminate\Database\Seeder;
use App\TipoPedido;
class TipoPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoPedido = TipoPedido::firstOrCreate([
            'nome' => 'Local',
            'descricao' => 'Pedido realizado no estabelecimento'
        ]);

        $tipoPedido2 = TipoPedido::firstOrCreate([
            'nome' => 'Viagem',
            'descricao' => 'Pedido para o cliente levar'
        ]);

        $tipoPedido3 = TipoPedido::firstOrCreate([
            'nome' => 'Delivery',
            'descricao' => 'Pedido para ser entregue à residencia do cliente'
        ]);
    }
}
