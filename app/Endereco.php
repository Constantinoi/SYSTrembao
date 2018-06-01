<?php

namespace App;
use App\Cliente;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model{
    protected $fillable = ['cep','bairro','logradouro','num','complemento','cliente_id'];

        public function cliente(){
            return $this->belongsTo('App\Cliente','cliente_id');
        
    }
}