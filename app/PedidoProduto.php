<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $table = "pedidos_produtos";
    protected $fillable = ['quantidade','valor','produto_id','pedido_id'];


    

    public function produtos(){
        return $this->belongsTo('App\Produto', 'produto_id');
    }


}
