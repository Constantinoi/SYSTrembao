<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";

    protected $fillable = ['numero_pedido','valor_total','observacao','status','mesa_id'];
    // status do pedido  = A = aberto, F = fechado, C = cancelado

    
    

    //  Métodos de Relacionamento   //
    public function mesa(){
        return $this->belongsTo(Mesa::class,'mesa_id');
    }

    public function produtos(){
        return $this->belongsToMany(Produto::class)
            ->withPivot('quantidade', 'valor')
            ->withTimestamps();
    }

    // END Métodos de Relacionamento END  //


    // -------------- Métodos para MANTER Pedidos --------------  //
    
    //cria um pedido e incrementa o numero do mesmo
    public static function novoPedido($valorTotal, $mesa){
        $numeroPedido;
        // se existir um pedido com essa mesa 
        // $verificaMesa = Pedido::existePedido($mesa);
        // if( $verificaMesa == null){
        //     //encerrar; tratar retorno
        //     return;
        // }       

        //puxa o último  pedido do dia
        $pedido = Pedido::ultimoPedido();
        if($pedido){
            //add +1 ao num do último pedido
            $numeroPedido = $pedido->numero_pedido + 1;
        }else{
            //caso seja primeiro, começa com 1
            $numeroPedido = 1 ;
        }        

        $pedido = Pedido::create([
            'numero_pedido' => $numeroPedido,
            'status' => 'A',
            'valor_total' => $valorTotal,
            'mesa_id' => $mesa,
           
        ]);
        
        return $pedido;        
    }
    

    public static function existePedido($mesa){
        
        $pedido = Pedido::where('mesa_id','=',$mesa)->firstOrFail();

        if($pedido != null){
            //se existir um pedido, return verdadeiro
            return true;
        }else{
            //se não existir, returnf falso
            return false;
        }

    }

    //verifica o número do último pedido
    public static function ultimoPedido(){
        //retorna o último pedido  realizado no dia
        $pedido = Pedido::whereDate('created_at', today())->latest()->first(); 

        return $pedido;
    }
   
    public static function listaPedidos(){
        
       
    }

    public function addProdutos($produtos){

    }

    public function cancelaPedido($pedido){

    }
   // END-------------- Métodos para MANTER Pedidos --------------END  //
}
