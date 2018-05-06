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
         
         $this->call(UserSeeder::class);
         $this->call(PapelSeeder::class);
         $this->call(PermissaoSeeder::class);
         $this->call(PapelPermissaoSeeder::class);
         $this->call(PapelUserSeeder::class);

         $this->call(EnderecoSeeder::class);
         $this->call(ClienteSeeder::class);

         $this->call(MesaStatusSeeder::class);
         $this->call(MesaSeeder::class);

         $this->call(PedidoStatusSeeder::class);
         $this->call(TipoPedidoSeeder::class);

         $this->call(TipoProdutoSeeder::class);
         $this->call(ProdutoStatusSeeder::class);
         $this->call(ProdutoSeeder::class);        
         
    }
}
