<?php

namespace App;
use App\CLiente;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model{
    protected $filleable = ['cep','bairro','logradouro','num','complemento',];

    public function cliente(){
        return $this->hasOne('App\Cliente');
        
    }
}