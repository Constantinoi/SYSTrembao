<?php

namespace App;
use App\Endereco;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
    protected $fillable = ['nome','data_nascimento','telefone_1','telefone_2','observacao','endereco_id'];
    
    public function endereco(){
        return $this->belongsTo('App\Endereco','endereco_id');
        
    }
}
