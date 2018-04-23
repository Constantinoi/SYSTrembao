<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{

   protected $fillable = ['nome','descricao'];

   public function produto(){
        return $this->hasOne('App\Produto');
        
    }
}
