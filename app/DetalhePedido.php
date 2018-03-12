<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalhePedido extends Model
{
    protected $table = "pedidos_produtos";
    protected $fillable = ['quantidade','valor','produto_id','pedido_id'];
}
