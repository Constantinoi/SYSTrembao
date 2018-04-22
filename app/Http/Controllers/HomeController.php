<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Mesa;
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
        //collection com pedidos de hj
        $pedidos = Pedido::where('status','A')->whereDate('created_at' , today())->get()->sort();
        $mesas = Mesa::where('status','A')->get()->sort();
        
        //se existirem pedidos HOJE, Listar
        if($pedidos->isNotEmpty()){  
            //dd($pedidos);          
            return view ('home', compact('pedidos','mesas'));
        }//se não, verificar se existem mesas fechadas com datas anteriores e liberar
        else{
            $mesas = Mesa::all();
           // $mesas->sortBy('numero');
            // dd($mesas);
            foreach($mesas as $mesa){
                if($mesa->status === 'F'){
                    $mesa->status = 'A';
                }
            }
            return view ('home', compact('pedidos','mesas'));   
        }
    }
}
