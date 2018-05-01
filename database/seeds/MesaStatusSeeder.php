<?php

use Illuminate\Database\Seeder;
use App\MesaStatus;
class MesaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = MesaStatus::firstOrCreate([
            'nome' => 'Livre',
            'descricao' => 'Mesa Livre'
        ]);

        $status2 = MesaStatus::firstOrCreate([
            'nome' => 'Ocupada',
            'descricao' => 'Mesa Ocupada'
        ]);
    }
}
