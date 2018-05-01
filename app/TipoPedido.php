<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPedido extends Model
{
    protected $table = "tipo_pedido";
    protected  $fillable = ['nome','descricao'];

    public function pedido(){
        return $this->hasOne(Pedido::class, 'tipo_pedido_id');
    }
}
