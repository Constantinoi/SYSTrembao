<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
   protected $table = "produtos";
   protected $fillable = ['nome','descricao','valor'];



   public function pedidos(){
       return $this->belongsToMany(Pedido::class);
   }

   
}
