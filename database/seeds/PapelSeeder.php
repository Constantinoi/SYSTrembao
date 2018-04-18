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
            'descricao' => 'acesso total ao sistema(root) '
        ]);

        echo "1 - Papéis criados com sucesso!";
    }
}
