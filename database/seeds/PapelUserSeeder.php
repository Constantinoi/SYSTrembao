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
        //admin
        DB::table('papel_user')->insert([
            'papel_id' => '1',
            'user_id' => '1'
           
        ]);
        DB::table('papel_user')->insert([
            'papel_id' => '2',
            'user_id' => '1'           
        ]);

        DB::table('papel_user')->insert([
            'papel_id' => '5',
            'user_id' => '1'           
        ]);

        //gerente
        DB::table('papel_user')->insert([
            'papel_id' => '2',
            'user_id' => '2'
           
        ]);
        DB::table('papel_user')->insert([
            'papel_id' => '5',
            'user_id' => '2'           
        ]);
        //balcao
        DB::table('papel_user')->insert([
            'papel_id' => '3',
            'user_id' => '3'
           
        ]);
        //garçom
        DB::table('papel_user')->insert([
            'papel_id' => '4',
            'user_id' => '4'
        ]);


        //cozinheiro
        DB::table('papel_user')->insert([
            'papel_id' => '5',
            'user_id' => '5'
           
        ]);



        echo "4 - Papél Admin associado ao usuário Admin !";
    }
}
