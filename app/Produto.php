<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Produto extends Model
{
    protected $table = "produtos";
    protected $fillable = ['nome','descricao','valor','imagem','tipo_produto_id','produto_status_id'];

    public function pedidos(){
        return $this->belongsToMany(Pedido::class);
    }

    public function produtoStatus(){
            return $this->belongsTo(ProdutoStatus::class,'produto_status_id');
    }

   

    public function tipoProduto(){
        return $this->belongsTo(TipoProduto::class,'tipo_produto_id');
    }
   
}
