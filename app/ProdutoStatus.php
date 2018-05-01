<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoStatus extends Model
{
    protected $table = "produto_status";
    protected  $fillable = ['nome','descricao'];

    public function produto(){
        return $this->hasOne(Produto::class, 'produto_status_id');
    }

    public static function produtosAtivos(){
        $statusProduto = ProdutoStatus::where('nome','=','Disponível')->first();
        return $statusProduto->id;
    }
}
