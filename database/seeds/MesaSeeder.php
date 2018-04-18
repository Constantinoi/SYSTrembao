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
            'status' => 'A'
        ]);
        $mesa2 = Mesa::firstOrCreate([
            'numero' => 2,
            'status' => 'A'
        ]);
        $mesa3 = Mesa::firstOrCreate([
            'numero' => 3,
            'status' => 'A'
        ]);
        $mesa4 = Mesa::firstOrCreate([
            'numero' => 4,
            'status' => 'A'
        ]);
        $mesa5 = Mesa::firstOrCreate([
            'numero' => 5,
            'status' => 'A'
        ]);
        $mesa6 = Mesa::firstOrCreate([
            'numero' => 6,
            'status' => 'A'
        ]);
        $mesa7 = Mesa::firstOrCreate([
            'numero' => 7,
            'status' => 'A'
        ]);
        $mesa8 = Mesa::firstOrCreate([
            'numero' => 8,
            'status' => 'A'
        ]);
        $mesa9 = Mesa::firstOrCreate([
            'numero' => 9,
            'status' => 'A'
        ]);
        $mesa10 = Mesa::firstOrCreate([
            'numero' => 10,
            'status' => 'A'
        ]);

        echo "Mesas criadas com sucesso | 10 mesas em ABERTO";
        
    }
}
