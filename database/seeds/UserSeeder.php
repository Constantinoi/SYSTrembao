<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
           
            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password')                      
            ]);

            User::create([
                'name'           => 'Gerente',
                'email'          => 'gerente@gmail.com',
                'password'       => bcrypt('password')                      
            ]);

            User::create([
                'name'           => 'Balconista',
                'email'          => 'balconista@gmail.com',
                'password'       => bcrypt('password')                      
            ]);

            User::create([
                'name'           => 'Garçom',
                'email'          => 'garcom@gmail.com',
                'password'       => bcrypt('password')                      
            ]);


            User::create([
                'name'           => 'Cozinheiro',
                'email'          => 'cozinha@cozinha.com',
                'password'       => bcrypt('password')                      
            ]);

            echo "0 -Usuário Admin criado com sucesso!";
        }
    }
}
