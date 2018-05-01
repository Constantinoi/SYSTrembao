<?php

use Illuminate\Database\Seeder;
use App\PedidoStatus;
class PedidoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedido = PedidoStatus::firstOrCreate([
            'nome' => 'Aberto',
            'descricao' => 'Pedido Aberto'
        ]);

        $pedido2 = PedidoStatus::firstOrCreate([
            'nome' => 'Finalizado',
            'descricao' => 'Pedido finalizado'
        ]);

        $pedido2 = PedidoStatus::firstOrCreate([
            'nome' => 'Cancelado',
            'descricao' => 'Pedido cancelado'
        ]);
    }
}
