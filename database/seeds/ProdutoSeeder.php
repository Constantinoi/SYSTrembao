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
            'tipo_produto_id' => 2,
            'produto_status_id' => 1,
            'imagem' => 'imagem/vazio.jpg',
            

        ]);


        $prod = Produto::firstOrCreate([
            'nome' => 'Lasanha',
            'descricao' => 'Bolonhesa',
            'valor' => 30.50,
            'tipo_produto_id' => 2,
            'produto_status_id' => 1,
            'imagem' => 'imagem/vazio.jpg',
            
        ]);

        $prod2 = Produto::firstOrCreate([
            'nome' => 'Batata-Frita',
            'descricao' => 'Porção Grande',
            'tipo_produto_id' => 2,
            'produto_status_id' => 1,
            'valor' => 12.50,
            'imagem' => 'imagem/vazio.jpg',
            
        ]);
    }
}
