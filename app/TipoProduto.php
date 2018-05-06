<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoProduto extends Model
{
    protected $table = "tipo_produto";
    protected  $fillable = ['nome','descricao'];

    public function produto(){
        return $this->hasOne(Produto::class, 'tipo_produto_id');
    }

    public static function tipoBebida(){
        $tipoBebida = TipoProduto::where('nome','=','Bebidas')->first();
        return $tipoBebida->id;
    }

    public static function tipoRefeicao(){
        $tipoRefeicao = TipoProduto::where('nome','=','Refeição')->first();
        return $tipoRefeicao->id;
    }
}
