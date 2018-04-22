<?php

use Illuminate\Database\Seeder;
use App\Papel;
class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Papel::firstOrCreate([
            'nome' => 'Admin',
            'descricao' => 'Mantem usuários e suas permissões'
        ]);
        $gerente = Papel::firstOrCreate([
            'nome' => 'Gerente',
            'descricao' => 'Mantém pedidos, produtos e clientes'
        ]);
        $balcao = Papel::firstOrCreate([
            'nome' => 'Balconista',
            'descricao' => 'Mantém pedidos e clientes'
        ]);
        $garçom = Papel::firstOrCreate([
            'nome' => 'Garçom',
            'descricao' => 'Mantém pedidos'
        ]);

        echo "1 - Papéis criados com sucesso!";
    }
}
