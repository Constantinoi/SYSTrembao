<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Mesa;
use App\PedidoStatus;
use App\MesaStatus; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $statusMesaAberta = MesaStatus::statusAberto();
        
        $statusPedidoAberto = PedidoStatus::statusAberto();
        
        //collection com pedidos de hj
        $pedidos = Pedido::where('pedido_status_id',$statusPedidoAberto)->whereDate('created_at' , today())->get()->sort();
        $mesas = Mesa::where('mesa_status_id',$statusMesaAberta)->get()->sort();
        // dd($mesas);
        //se existirem pedidos HOJE, Listar
        if($pedidos->isNotEmpty()){  
            //dd($pedidos);          
            return view ('home', compact('pedidos','mesas'));
        }//se não, verificar se existem mesas fechadas com datas anteriores e liberar
        else{
            $mesas = Mesa::all();
            
            $statusMesaFechada = MesaStatus::statusOcupado();
            //dd($statusMesaFechada);
            foreach($mesas as $mesa){
                if($mesa->mesa_status_id == $statusMesaFechada  ){
                    $mesa->mesaStatus()->associate($statusMesaAberta);  
                    $mesa->save();
                }
            }
            // dd($mesas);
            return view ('home', compact('pedidos','mesas'));   
        }
    }
}
