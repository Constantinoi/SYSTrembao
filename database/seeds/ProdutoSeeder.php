<?php

use Illuminate\Database\Seeder;
use App\Produto;
class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prod1 = Produto::firstOrCreate([
            'nome' => 'Suco de Laranja',
            'descricao' => 'Jarra de 750ml',
            'valor' => 8.50,
        ]);


        $prod = Produto::firstOrCreate([
            'nome' => 'Lasanha',
            'descricao' => 'Bolonhesa',
            'valor' => 30.50,
        ]);

        $prod2 = Produto::firstOrCreate([
            'nome' => 'Batata-Frita',
            'descricao' => 'Porção Grande',
            'valor' => 12.50,
        ]);
    }
}
