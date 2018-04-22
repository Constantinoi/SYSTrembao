<?php

use Illuminate\Database\Seeder;
use App\Permissao;
class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $admin = Permissao::firstOrCreate([
                'nome' => 'Administrador',
                'descricao' =>'Acesso a todas as funcionalidades de ADMIN'
            ]);

        $pedido = Permissao::firstOrCreate([
            'nome' => 'Manter Pedidos',
            'descricao' =>'Acesso a todas a funcionalidades de Pedidos'
        ]);

        $produto = Permissao::firstOrCreate([
            'nome' => 'Manter Produtos',
            'descricao' =>'Acesso a todas a funcionalidades de Produtos'
        ]);

        $cliente = Permissao::firstOrCreate([
            'nome' =>'Manter Clientes',
            'descricao' =>'Acesso a todas a funcionalidades de Clientes'
        ]);
       
        // $usuarios2 = Permissao::firstOrCreate([
        //     'nome' =>'Criar usuário',
        //     'descricao' =>'Permissão para adicionar Usuários'
        // ]);
        // $usuarios2 = Permissao::firstOrCreate([
        //     'nome' =>'Editar usuário',
        //     'descricao' =>'Permissão para editar Usuários'
        // ]);
        // $usuarios3 = Permissao::firstOrCreate([
        //     'nome' =>'Deletar usuário',
        //     'descricao' =>'Permissão para deletar Usuários'
        // ]);
  
        // $papeis1 = Permissao::firstOrCreate([
        //     'nome' =>'Lista de papéis',
        //     'descricao' =>'Permissão para vizualizar lista de Papéis'
        // ]);
        // $papeis2 = Permissao::firstOrCreate([
        //     'nome' =>'Criar papel',
        //     'descricao' =>'Permissão para adicionar Papéis'
        // ]);
        // $papeis3 = Permissao::firstOrCreate([
        //     'nome' =>'Editar papel',
        //     'descricao' =>'Permissão para editar Papéis'
        // ]);
       
  
        // $papeis4 = Permissao::firstOrCreate([
        //     'nome' =>'Deletar papel',
        //     'descricao' =>'Permissão para deletar Papéis'
        // ]);

        echo "2 - Permissões de Admin criadas com sucesso!";
    }
}
