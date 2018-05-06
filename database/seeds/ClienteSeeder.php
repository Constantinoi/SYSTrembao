<?php

use Illuminate\Database\Seeder;
use App\Cliente;
class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $cliente = Cliente::firstOrCreate([
            'nome'=>'padrao',
            'data_nascimento'=> '16/03/1997',
            'telefone_1'=>'(95) 33624-6232',
            'telefone_2'=>'(95) 99172-3361',
            'observacao'=>'padrao',
            'endereco_id'=> 1
        ]);
    }
}
