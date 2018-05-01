<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PedidoStatus;
class PedidoStatus extends Model
{
    protected $table = "pedido_status";
    protected  $fillable = ['nome','descricao'];


    public function pedido(){
        return $this->hasOne(Pedido::class, 'pedido_status_id');
    }
    public static function statusAberto(){
        $statusPedido = PedidoStatus::where('nome','=','Aberto')->first();
        return $statusPedido->id;
    }

    public static function statusCancelado(){
        $statusPedido = PedidoStatus::where('nome','=','Cancelado')->first();
        return $statusPedido->id;
    }

    public static function statusFinalizado(){
        $statusPedido = PedidoStatus::where('nome','=','Finalizado')->first();
        return $statusPedido->id;
    }

   
    
}
