<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    protected $fillable = ['valor_total','observacao','status'];



    public function produtos(){
        return $this->belongsToMany(Produto::class)
            ->withPivot('quantidade', 'valor')
            ->withTimestamps();
    }
 

    public static function checkPedido($where)
    {
        $pedido = Pedido::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null; // se não for vazio ele retorna o id do pedido
    }

    public function adicionaProduto($produto)
    {
        if (is_string($produto)) {
            $produto = Produto::where('nome','=',$produto)->firstOrFail();
        }

        if($this->existeProduto($produto)){
            return;
        }

        return $this->produtos()->attach($produto);

    }

    public function existeProduto($produto)
    {
        if (is_string($produto)) {
            $produto = Produto::where('nome','=',$produto)->firstOrFail();
        }

        return (boolean) $this->produtos()->find($produto->id);

    }

    public function removeProduto($produto)
    {
        if (is_string($produto)) {
            $produto = Produto::where('produto_id','=',$produto)->firstOrFail();
        }

        return $this->produtos()->detach($produto);
    }
   
}
