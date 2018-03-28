<?php

namespace App;
use App\Cliente;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model{
    protected $fillable = ['cep','bairro','logradouro','num','complemento'];

    public function cliente(){
        return $this->hasOne('App\Cliente');
        
    }
}