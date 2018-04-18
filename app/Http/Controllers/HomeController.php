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
        // $pedido = Pedido::latest()->first();
    
        $pedidos = Pedido::where('status','A')->whereDate('created_at' ,today())->get()->sortKeys();                  
                    
        // $pedidos = Pedido::where('status','A')->get()->sortKeys();
        $mesas = Mesa::where('status','A')->get()->sort();
        //   dd($pedidos);
        return view ('home', compact('pedidos','mesas'));
    }
}
