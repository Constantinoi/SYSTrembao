<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PedidoStatus;
class Pedido extends Model
{
    protected $table = "pedidos";

    protected $fillable = ['numero_pedido','valor_total','observacao','mesa_id','cliente_id','pedido_status_id','tipo_pedido_id'];
                                                             // 

    
    

    //  Métodos de Relacionamento   //
    public function mesa(){
        return $this->belongsTo(Mesa::class,'mesa_id');
    }

    public function produtos(){
        return $this->belongsToMany(Produto::class)
            ->withPivot('quantidade', 'valor')
            ->withTimestamps();
    }
    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id');
    }

    public function pedidoStatus(){
        return $this->belongsTo(PedidoStatus::class,'pedido_status_id');
    }

    public function tipoPedido(){
        return $this->belongsTo(TipoPedido::class,'tipo_pedido_id');
    }


    // END Métodos de Relacionamento END  //



    // -------------- Métodos para MANTER Pedidos --------------  //
    
    //cria um pedido e incrementa o numero do mesmo
    public static function novoPedido($valorTotal, $mesa_id, $tipo_pedido_id, $cliente_id){
        $numeroPedido;    
        
        
        //puxa o último  pedido do dia
        $pedido = Pedido::ultimoPedido();

        if($pedido){
            //add +1 ao num do último pedido
            $numeroPedido = $pedido->numero_pedido + 1;
        }else{
            //caso seja primeiro, começa com 1
            $numeroPedido = 1 ;
        }        

        
        $statusPedido = PedidoStatus::where('nome','=','Aberto')->first();
        $pedido = Pedido::create([
            'numero_pedido' => $numeroPedido,
            'valor_total' => $valorTotal,
            'mesa_id' => $mesa_id,
            'cliente_id' => $cliente_id,
            'pedido_status_id' => $statusPedido->id,
            'tipo_pedido_id' =>  $tipo_pedido_id           
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
