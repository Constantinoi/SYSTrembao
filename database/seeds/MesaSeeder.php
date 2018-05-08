<?php

use Illuminate\Database\Seeder;
use App\Mesa;
class MesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mesa0 = Mesa::firstOrCreate([
            'nome' => 'balcao' ,
            'numero' => 0,
            'mesa_status_id' => 1
        ]);
        $mesa = Mesa::firstOrCreate([
            'nome' => 1,
            'numero' => 1,
            'mesa_status_id' => 1
        ]);
        $mesa2 = Mesa::firstOrCreate([
            'nome' => 2,
            'numero' => 2,
            'mesa_status_id' => 1
        ]);
        $mesa3 = Mesa::firstOrCreate([
            'nome' => 3,
            'numero' => 3,
            'mesa_status_id' => 1
        ]);
        $mesa4 = Mesa::firstOrCreate([
            'nome' => 4,
            'numero' => 4,
            'mesa_status_id' => 1
        ]);
        $mesa5 = Mesa::firstOrCreate([
            'nome' => 5,
            'numero' => 5,
            'mesa_status_id' => 1
        ]);
        $mesa6 = Mesa::firstOrCreate([
            'nome' => 6,
            'numero' => 6,
            'mesa_status_id' => 1
        ]);
        $mesa7 = Mesa::firstOrCreate([
            'nome' => 7,
            'numero' => 7,
            'mesa_status_id' => 1
        ]);
        $mesa8 = Mesa::firstOrCreate([
            'nome' => 8,
            'numero' => 8,
            'mesa_status_id' => 1
        ]);
        $mesa9 = Mesa::firstOrCreate([
            'nome' => 9,
            'numero' => 9,
            'mesa_status_id' => 1
        ]);
        $mesa10 = Mesa::firstOrCreate([
            'nome' => 10,
            'numero' => 10,
            'mesa_status_id' => 1
        ]);

        echo "Mesas criadas com sucesso | 10 mesas em ABERTO";
        
    }
}
