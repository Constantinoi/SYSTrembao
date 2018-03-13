<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    protected $fillable = ['valor_total','observacao'];



    public function produtos (){
        return $this->belongsToMany(Produto::class);
    }

    public function pedido_produto(){
        return $this->hasMany(DetalheProduto::class);
    }

   

    public static function consultaId($where)
    {
        $pedido = self::where($where)->first(['id']);
        return !empty($pedido->id) ? $pedido->id : null;
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
            $produto = Produto::where('nome','=',$produto)->firstOrFail();
        }

        return $this->produtos()->detach($produto);
    }
}
