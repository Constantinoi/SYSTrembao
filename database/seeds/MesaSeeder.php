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
        $mesa = Mesa::firstOrCreate([
            'numero' => 1,
            'mesa_status_id' => 1
        ]);
        $mesa2 = Mesa::firstOrCreate([
            'numero' => 2,
            'mesa_status_id' => 1
        ]);
        $mesa3 = Mesa::firstOrCreate([
            'numero' => 3,
            'mesa_status_id' => 1
        ]);
        $mesa4 = Mesa::firstOrCreate([
            'numero' => 4,
            'mesa_status_id' => 1
        ]);
        $mesa5 = Mesa::firstOrCreate([
            'numero' => 5,
            'mesa_status_id' => 1
        ]);
        $mesa6 = Mesa::firstOrCreate([
            'numero' => 6,
            'mesa_status_id' => 1
        ]);
        $mesa7 = Mesa::firstOrCreate([
            'numero' => 7,
            'mesa_status_id' => 1
        ]);
        $mesa8 = Mesa::firstOrCreate([
            'numero' => 8,
            'mesa_status_id' => 1
        ]);
        $mesa9 = Mesa::firstOrCreate([
            'numero' => 9,
            'mesa_status_id' => 1
        ]);
        $mesa10 = Mesa::firstOrCreate([
            'numero' => 10,
            'mesa_status_id' => 1
        ]);

        echo "Mesas criadas com sucesso | 10 mesas em ABERTO";
        
    }
}
