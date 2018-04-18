<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Produto;
use App\PedidoProduto;
use App\Mesa;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    
    public function index(){
        //$pedidos = Pedido::whereDate('created_at', today())->get(); 

        // $pedido = Pedido::latest()->first();
        
                		
        // dd($pedidos);
    }
    
    public function show(Request $request){

        $pedido_id = $request->input('id');
        $pedido = Pedido::find($pedido_id);

        $produtos = $pedido->produtos()->get();
        
        foreach($produtos as $i => $produto){
            $produtos[$i] = $produto;
        }       
        $produtos_json = json_encode($produtos);

        return ($produtos_json);
    }
    
   
    public function createMesa(Mesa $mesa){
        $produtos = Produto::all();
        $mesas = Mesa::where('status','A')->get()->sort();
        if($mesa){
            //dd($mesa);
            return view('pedido.create', compact('produtos','mesa','mesas')); 
        }

    }
    public function create(){     
        $produtos = Produto::all();
        $mesas = Mesa::where('status','A')->get()->sort();
      
        return view('pedido.create', compact('produtos','mesas')); 
    }

    public function store(Request $request){   
       
        $produtos_json = $request->input('produtos'); 
        $valor_total = $request->input('valor_total');
        $mesa_id = $request->input('mesa_id');

        // método que transforma JSON em uma array PHP associativa
        $produtos = json_decode($produtos_json, true);
        //print_r($produtos);       // Dump all data of the Array
        
        //criar pedido
        $pedido = Pedido::novoPedido($valor_total, $mesa_id);
       
        //verifica se existe um pedido
        if($pedido){
            //insere todos os produtos da array no pedido
            foreach ($produtos as $key => $value) {
                $produto = Produto::find($value["id"]);
                //associando as tabelas pedido e produto com a tabela pivot
                $pedido->produtos()->attach($produto->id, 
                                        [
                                        'quantidade' => $value['qtd'], 
                                        'valor' =>  $value['valor']                                                                                                
                                        ]);
            }

        $mesa = Mesa::find($mesa_id);

        $mesa->status = 'F';

        $mesa->save();           
        }     

        
     
        // retorna o pedido no formato json 
        return response()->json($pedido);       
    }  

    public function edit (Pedido $pedido)
    {
        
        $produtos = Produto::all();

        return view('pedido.edit', compact('pedido','produtos'));
    }

    public function update(Request $request)
    {
        $produtos_json = $request->input('produtos'); 
        $valor_total = $request->input('valor_total');


        $pedido_id = $request->input('pedido_id');
        //////////// pega o pedido    /////////////
        $pedido = Pedido::find($pedido_id);
         ////////// deleta todos os produtos       ///////////
        $pedido->produtos()->detach();
        //////////////// atualiza o novo valorTotal //////////////
        $pedido->valor_total = $valor_total;
        $pedido->save();
       
        
        // método que transforma JSON em uma array PHP associativa
        $produtos = json_decode($produtos_json, true);
        if($produtos == null){
            $pedido = $pedido->delete();
            $pedido=null;
        }
        
        //verifica se existe um pedido
        if($pedido){
            //insere todos os produtos da array no pedido
            foreach ($produtos as $key => $value) {
                $produto = Produto::find($value["id"]);
                //associando as tabelas pedido e produto com a tabela pivot
                $pedido->produtos()->attach($produto->id, 
                                        [
                                        'quantidade' => $value['qtd'], 
                                        'valor' =>  $value['valor']                                                                                                
                                        ]);
            }           
        }     
     
        // retorna a array de produtos no formato json 
        return response()->json($produtos);       
    }

 
    //cancela Pedido
     public function cancelaPedido(Request $request){

        $pedido_id = $request->input('pedido_id'); 
        $pedido = Pedido::find($pedido_id);
        $pedido->status = 'C';
        $pedido->save();
        
        $mesa = Mesa::find($pedido->mesa_id);
        $mesa->status = 'A';
        $mesa->save();

        $pedido->delete();

        
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);

     }
     public function destroy(Request $request ){
        $pedido_id = $request->input('pedido_id'); 
        $pedido = Pedido::find($pedido_id); 
        $pedido->status = 'F';
        $pedido->save();

        $mesa = Mesa::find($pedido->mesa_id);
        $mesa->status = 'A';
        $mesa->save();
        
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
    // public function produtoDestroy($pedido_id,$produto_id)
    // {

    //     //$this->middleware('VerifyCsrfToken');

    //    // $dados = $request->all();
        
    //     $pedido = Pedido::find($pedido_id);
    //     $produto = Produto::find($produto_id);
    //     // $pedido = Pedido::consultaId([
    //     //     'id'      => $idpedido,
    //     //     'user_id' => $idusuario,
    //     //     'status'  => 'RE' // Reservada
    //     //     ]);

    //     // if( empty($idpedido) ) {
    //     //     $req->session()->flash('mensagem-falha', 'Pedido não encontrado!');
    //     //     return redirect()->route('carrinho.index');
    //     // }

    //                 // $where_produto = [
    //                 //     'pedido_id'  => $pedido_id,
    //                 //     'produto_id' => $produto_id
    //                 // ];

    //                 //$produto = PedidoProduto::where($where_produto)->orderBy('id')->first();
        
        
    //     // if( empty($produto->id) ) {
    //     //     $req->session()->flash('mensagem-falha', 'Produto não encontrado no carrinho!');
    //     //     return redirect()->route('carrinho.index');
    //     // }

    

    //     //dd($produto);
    //                 // $where_produto['id'] = $produto->id;
    //                 // PedidoProduto::where($where_produto)->delete();

    //     // $check_pedido = PedidoProduto::where([
    //     //     'pedido_id' => $produto->pedido_id
    //     //     ])->exists();

    //     // if( !$check_pedido ) {
    //     //     Pedido::where([
    //     //         'id' => $produto->pedido_id
    //     //         ])->delete();
    //     // }

    //    // $req->session()->flash('mensagem-sucesso', 'Produto removido do carrinho com sucesso!');
    //    $pedido->removeProduto($produto);
    //    $produtos = Produto::all();
    //     //$detalhes = PedidoProduto::where('pedido_id','=',$pedido->id)->get();

    //    //dd($pedido,$dados,$produto,$detalhes);
    //    return view('pedido.produto', compact('pedido', 'produtos'));

       
    // }


    public function produtoStore(Request $request)
    {
        $dados = $request->all();
        $produtos = [];
        dd($dados);
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
        return view('pedido.create', compact('pedido', 'produtos')); 
      }
}
