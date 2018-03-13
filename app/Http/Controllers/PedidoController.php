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

        //associar status, mesa , cliente e observacao do cliente
        $pedido = Pedido::create([
            
            'observacao'=>'teste'
        ]);

        $produtos = Produto::all();
        $detalhes = PedidoProduto::where('pedido_id','=',$pedido);

        return view('pedido.produto', compact('pedido', 'produtos','detalhes')); 
    }

    public function produtoStore(Request $request,$id)
    {
        $pedido = Pedido::find($id);
        $dados = $request->all();
        $produto = Produto::find($dados['produto_id']);
        $quantidade = $dados['quantidade'];
        if( empty($produto->id) ) {
           // $req->session()->flash('mensagem-falha', 'Produto não encontrado em nossa loja!');
            return redirect()->back();
        }

/*
        $pedido = Pedido::consultaId([
            'user_id' => $idusuario,
            'status'  => 'RE' // Reservada
            ]);

        if( empty($idpedido) ) {
            $pedido_novo = Pedido::create([
                'user_id' => $idusuario,
                'status'  => 'RE'
                ]);

            $idpedido = $pedido_novo->id;

        }
*/
        PedidoProduto::create([
            'pedido_id'  => $pedido->id,
            'produto_id' => $produto->id,
            'valor'      => $produto->valor,
            'quantidade'     =>  $dados['quantidade']
            ]);      

      
        $produtos = Produto::all();
        $detalhes = PedidoProduto::where('pedido_id','=',$pedido->id)->get();

        //dd($pedido,$dados,$produto,$detalhes);
        return view('pedido.produto', compact('pedido', 'produtos','detalhes')); 
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        // $pedido = Pedido::consultaId([
        //     'id'      => $idpedido,
        //     'user_id' => $idusuario,
        //     'status'  => 'RE' // Reservada
        //     ]);

        // if( empty($idpedido) ) {
        //     $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
        //     return redirect()->route('carrinho.index');
        // }

        $where_produto = [
            'pedido_id'  => $pedido_id,
            'produto_id' => $produto_id
        ];

        $produto = PedidoProduto::where($where_produto)->orderBy('id')->first();
        // if( empty($produto->id) ) {
        //     $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
        //     return redirect()->route('carrinho.index');
        // }

        // if( $remove_apenas_item ) {
        //     $where_produto['id'] = $produto->id;
        // }

        //dd($produto);
        $where_produto['id'] = $produto->id;
        PedidoProduto::where($where_produto)->delete();

        $check_pedido = PedidoProduto::where([
            'pedido_id' => $produto->pedido_id
            ])->exists();

        if( !$check_pedido ) {
            Pedido::where([
                'id' => $produto->pedido_id
                ])->delete();
        }

       // $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');
       $produtos = Produto::all();
       $detalhes = PedidoProduto::where('pedido_id','=',$pedido->id)->get();

       //dd($pedido,$dados,$produto,$detalhes);
       return view('pedido.produto', compact('pedido', 'produtos','detalhes'));

        return redirect()->route('');
    }
}
