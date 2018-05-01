<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Permissao;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
    //     foreach ($this->listaPermissoes() as $permissao) {
    //         Gate::define($permissao->nome,function($user) use($permissao){
    //        return $user->temUmPapelDestes($permissao->papeis);
    //         });
    //    }
  
      }
  
    //   public function listaPermissoes()
    //   {
    //     return Permissao::with('papeis')->get();
    //    }
    
}
