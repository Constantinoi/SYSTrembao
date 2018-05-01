<?php

use Illuminate\Database\Seeder;
use App\ProdutoStatus;
class ProdutoStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produto = ProdutoStatus::firstOrCreate([
            'nome' => 'Disponível',
            'descricao' => 'produto disponível para venda'
        ]);

        $produto2 = ProdutoStatus::firstOrCreate([
            'nome' => 'Indisponível',
            'descricao' => 'produto indisponível para venda'
        ]);
    }
}
