<?php

use Illuminate\Database\Seeder;
use App\Tipo;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo1 = Tipo::firstOrCreate([
            'nome' => 'Refeição',
            'descricao' => 'Prato Feito',
        ]);
        $tipo2 = Tipo::firstOrCreate([
            'nome' => 'Bebidas',
            'descricao' => 'Refrigerantes , sucos e vitaminas',
        ]);
        $tipo3 = Tipo::firstOrCreate([
            'nome' => 'Sobremesas',
            'descricao' => 'Doces',
        ]);
    }
}
