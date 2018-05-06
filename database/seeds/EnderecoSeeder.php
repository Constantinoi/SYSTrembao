<?php

use Illuminate\Database\Seeder;
use App\Endereco;
class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $endereco = Endereco::firstOrCreate([
            'cep'=>69317000,
            'bairro' => 'padrao',
            'logradouro' => 'padrao',
            'num' => 00,
            'complemento' => 'padrao'
        ]);
    }
}
