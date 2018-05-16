<?php

namespace App;
use App\Endereco;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $fillable = ['nome','data_nascimento','telefone_1','telefone_2','observacao'];
    
    public function endereco(){
        return $this->hasOne('App\Endereco');
        
    }
}
