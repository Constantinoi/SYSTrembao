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
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 1
        ]);
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 2
        ]);
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 3
        ]);
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 4
        ]);
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 5
        ]);
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 6
        ]);
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 7
        ]);
        
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 8
        ]);
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 9
        ]);
        DB::table('papel_permissao')->insert([
            'papel_id' => 1,
            'permissao_id' => 10
        ]);

        echo "3 - Papéis e Permisões de Admin associados com sucesso!";
    }
}
