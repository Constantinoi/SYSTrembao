<?php

use Illuminate\Database\Seeder;
use App\TipoProduto;
class TipoProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoProduto = TipoProduto::firstOrCreate([
            'nome' => 'Refeição',
            'descricao' => 'Sanduíches | Pizzas | PFs'
        ]);

        $tipoProduto = TipoProduto::firstOrCreate([
            'nome' => 'Bebidas',
            'descricao' => 'Sucos | Refrigerantes'
        ]);
    }
}
