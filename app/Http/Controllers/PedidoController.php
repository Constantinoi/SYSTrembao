<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Produto;
use App\PedidoProduto;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {     

        $produtos = Produto::all();
        

        return view('pedido.produto', compact('produtos')); 
    }

    public function produtoStore(Request $request, Pedido $pedido)
    {
        
        $dados = $request->all();

        $pedido = Pedido::find($pedido->id);
        $produto = Produto::find($dados['produto_id']);
        //dd($pedido);
        $quantidade = $dados['quantidade'];

        if( empty($produto->id) ) {
           // $req->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect()->back();
        }

        // verificar se está aberto e se pertence ao cliente
        // $pedido = Pedido::checkPedido([
        //     'status'  => 'A',
        //     'id'      => $pedido->id // aberto
        //     ]);
        //dd($pedido);
        
        if( empty($pedido) ) {
            $pedido = Pedido::create([
                'status' => 'A'
            ]);
        }

            //dd($pedido_novo); 

        $pedido->produtos()->attach($produto->id, 
                                    [
                                    'quantidade' => $dados['quantidade'], 
                                    'valor' => 00.00                                                                                                
                                    ]);     
             
        $produtos = Produto::all();      
        //dd($pedido,$dados,$produto,$detalhes);
        return view('pedido.produto', compact('pedido', 'produtos')); 
    }
 
   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function produtoDestroy($pedido_id,$produto_id)
    {

        //$this->middleware('VerifyCsrfToken');

       // $dados = $request->all();
        
        $pedido = Pedido::find($pedido_id);
        $produto = Produto::find($produto_id);
        // $pedido = Pedido::consultaId([
        //     'id'      => $idpedido,
        //     'user_id' => $idusuario,
        //     'status'  => 'RE' // Reservada
        //     ]);

        // if( empty($idpedido) ) {
        //     $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
        //     return redirect()->route('carrinho.index');
        // }

                    // $where_produto = [
                    //     'pedido_id'  => $pedido_id,
                    //     'produto_id' => $produto_id
                    // ];

                    //$produto = PedidoProduto::where($where_produto)->orderBy('id')->first();
        
        
        // if( empty($produto->id) ) {
        //     $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
        //     return redirect()->route('carrinho.index');
        // }

    

        //dd($produto);
                    // $where_produto['id'] = $produto->id;
                    // PedidoProduto::where($where_produto)->delete();

        // $check_pedido = PedidoProduto::where([
        //     'pedido_id' => $produto->pedido_id
        //     ])->exists();

        // if( !$check_pedido ) {
        //     Pedido::where([
        //         'id' => $produto->pedido_id
        //         ])->delete();
        // }

       // $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');
       $pedido->removeProduto($produto);
       $produtos = Produto::all();
                                //$detalhes = PedidoProduto::where('pedido_id','=',$pedido->id)->get();

       //dd($pedido,$dados,$produto,$detalhes);
       return view('pedido.produto', compact('pedido', 'produtos'));

       
    }
}
