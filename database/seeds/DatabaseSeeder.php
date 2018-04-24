<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {
        
        $this->call(TipoSeeder::class);
         $this->call(ProdutoSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(PapelSeeder::class);
         $this->call(PermissaoSeeder::class);
         $this->call(PapelPermissaoSeeder::class);
         $this->call(PapelUserSeeder::class);
         $this->call(MesaSeeder::class);
        ;
         
    }
}
