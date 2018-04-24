<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

   protected $fillable = ['nome','descricao','valor','imagem','tipo_id'];

   public function pedidos(){
       return $this->belongsToMany(Pedido::class);
   }
   public function tipo(){
        return $this->belongsTo('App\Tipo','tipo_id');
        
    }
   public function imagem(){
        return $this->hasMany('App\Imagem');
        
    }

   
}
