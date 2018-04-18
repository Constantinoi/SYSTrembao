<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Papel;
class PapelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('papel_user')->insert([
            'papel_id' => '1',
            'user_id' => '1'
           
        ]);
        echo "4 - Papél Admin associado ao usuário Admin !";
    }
}
