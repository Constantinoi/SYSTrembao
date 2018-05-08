<?php

use Illuminate\Database\Seeder;
use App\Papel;
use App\Permissao;
class PapelPermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //admin
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 1
        ]);

        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 5
        ]);
        //gerente
        DB::table('papel_permissao')->insert([
            'papel_id' => 2,
            'permissao_id' => 2
        ]);
        //gerente
        DB::table('papel_permissao')->insert([
            'papel_id' => 2,
            'permissao_id' => 3
        ]);
        //gerente
        DB::table('papel_permissao')->insert([
            'papel_id' => 2,
            'permissao_id' => 4
        ]);
        //balcao
        DB::table('papel_permissao')->insert([
            'papel_id' => 3,
            'permissao_id' => 2
        ]);
        //balcao
        DB::table('papel_permissao')->insert([
            'papel_id' => 3,
            'permissao_id' => 4
        ]);
        //garçom
        DB::table('papel_permissao')->insert([
            'papel_id' => 4,
            'permissao_id' => 2
        ]);

        DB::table('papel_permissao')->insert([
            'papel_id' => 4,
            'permissao_id' => 4
        ]);

        //cozinheiro
        DB::table('papel_permissao')->insert([
            'papel_id' => 5,
            'permissao_id' => 5
        ]);






        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 1
        // ]);
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 2
        // ]);
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 3
        // ]);
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 4
        // ]);
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 5
        // ]);
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 6
        // ]);
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 7
        // ]);
        
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 8
        // ]);
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 9
        // ]);
        // DB::table('papel_permissao')->insert([
        //     'papel_id' => 1,
        //     'permissao_id' => 10
        // ]);

        echo "3 - Papéis e Permisões associados com sucesso!";
    }
}
