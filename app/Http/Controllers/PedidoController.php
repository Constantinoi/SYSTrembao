<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\Produto;
use App\Mesa;
use App\TipoPedido;
use App\TipoProduto;
use App\MesaStatus;
use App\PedidoStatus;
use App\ProdutoStatus;
use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PedidoController extends Controller
{
    
    public function index(){

        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }  
        // $pedidos = Pedido::whereDate('created_at', today())->get(); 
        $pedidos = Pedido::where('status', 'A')->get(); 
        // $pedido = Pedido::latest()->first();
        
                		
         dd($pedidos);
    }

    
    public function show(Request $request){

        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }  

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
        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }  
        $statusAtivo = ProdutoStatus::produtosAtivos();  
        $produtos = Produto::where('produto_status_id', $statusAtivo)->get()->sort();

        $statusMesaAberta = MesaStatus::statusAberto();
        $mesas = Mesa::where('mesa_status_id', $statusMesaAberta)->get()->sort();

        $tipoBebida = TipoProduto::tipoBebida();
        $tipoRefeicao = TipoProduto::tipoRefeicao();

        $tipos = TipoPedido::all();
        $clientes = Cliente::all();
        if($mesa){
            //dd($mesa);
            return view('pedido.create', compact('produtos','mesa','mesas','tipos','clientes', 'tipoBebida', 'tipoRefeicao')); 
        }

    }


    public function create(){     
        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }
        //recebe o id do status ativo
        $statusAtivo = ProdutoStatus::produtosAtivos();  
        $produtos = Produto::where('produto_status_id', $statusAtivo)->get()->sort();

        $statusMesaAberta = MesaStatus::statusAberto();
        $mesas = Mesa::where('mesa_status_id', $statusMesaAberta)->get()->sort();

        $tipoBebida = TipoProduto::tipoBebida();
        $tipoRefeicao = TipoProduto::tipoRefeicao();

        $tipos = TipoPedido::all();
        $clientes = Cliente::all();
        return view('pedido.create', compact('produtos', 'mesas', 'tipos', 'clientes', 'tipoBebida', 'tipoRefeicao')); 
    }


    public function store(Request $request){   
        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }  
       
        $produtos_json = $request->input('produtos'); 
        $valor_total = $request->input('valor_total');
        $mesa_id = $request->input('mesa_id');
        $tipo_pedido_id = $request->input('tipo_pedido_id');
        $cliente_id = $request->input('cliente_id');

        // método que transforma JSON em uma array PHP associativa
        $produtos = json_decode($produtos_json, true);
        //print_r($produtos);       // Dump all data of the Array
        
        //criar pedido
        $pedido = Pedido::novoPedido($valor_total, $mesa_id, $tipo_pedido_id, $cliente_id);
       
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
        $statusMesaOcupada = MesaStatus::statusOcupado();
        $mesa->mesaStatus()->associate($statusMesaOcupada);        
        $mesa->save();           
        }     

        
     
        // retorna o pedido no formato json 
        return response()->json($pedido);       
    }  


    public function edit(Pedido $pedido)
    {

        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }  
        
        $statusAtivo = ProdutoStatus::produtosAtivos();  
        $produtos = Produto::where('produto_status_id', $statusAtivo)->get()->sort();

        $mesa_id = $pedido->mesa_id;

        $mesa = Mesa::find($mesa_id);
        $status = MesaStatus::statusAberto();
        $mesa->mesaStatus()->associate($status);        
        $mesa->save(); 

        $statusMesaAberta = MesaStatus::statusAberto();
        $mesas = Mesa::where('mesa_status_id', $statusMesaAberta)->get()->sort();

        $tipoBebida = TipoProduto::tipoBebida();
        $tipoRefeicao = TipoProduto::tipoRefeicao();

        $tipos = TipoPedido::all();
        $clientes = Cliente::all();

        return view('pedido.edit', compact('pedido','produtos','mesas','tipos','clientes', 'tipoBebida', 'tipoRefeicao'));
    }


    public function update(Request $request)
    {        

        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }  

        $produtos_json = $request->input('produtos'); 
        $valor_total = $request->input('valor_total');
        $mesa_id = $request->input('mesa_id');
        $pedido_id = $request->input('pedido_id');
        $tipo_pedido_id = $request->input('tipo_pedido_id');
        $cliente_id = $request->input('cliente_id');

        // pega o pedido    
        $pedido = Pedido::find($pedido_id);
         // deleta todos os produtos       
        $pedido->produtos()->detach();
        /// atualiza o novo valorTotal 
        $pedido->valor_total = $valor_total;
        $pedido->mesa()->associate($mesa_id);
        $pedido->tipoPedido()->associate($tipo_pedido_id);
        $pedido->cliente()->associate($cliente_id);
        $pedido->save();
       
        
        // método que transforma uma array JSON em uma array PHP associativa
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

            
            $mesa = Mesa::find($mesa_id);
            $statusMesaOcupada = MesaStatus::statusOcupado();
            $mesa->mesaStatus()->associate($statusMesaOcupada);        
            $mesa->save();                
        }     
        
        // retorna a array de produtos no formato json 
        return response()->json($produtos);       
    }
 
    //cancela Pedido
     public function cancelaPedido(Request $request){

        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }  

        $pedido_id = $request->input('pedido_id'); 
        $pedido = Pedido::find($pedido_id);
        
        $mesa_id = $pedido->mesa_id;        

        $mesa = Mesa::find($mesa_id);
        $status = MesaStatus::statusAberto();
        $mesa->mesaStatus()->associate($status);        
        $mesa->save();    

        $pedido->delete();

        
        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);

     }

     //finaliza pedido
     public function destroy(Request $request ){

        if(Gate::denies('Manter Pedidos')){
            abort(403,"Não autorizado!");
        }  
        $pedido_id = $request->input('pedido_id'); 
        $pedido = Pedido::find($pedido_id);
        $status = PedidoStatus::statusFinalizado();
        $pedido->pedidoStatus()->associate($status);
        $pedido->save();

        $mesa_id = $pedido->mesa_id;

        $mesa = Mesa::find($mesa_id);
        $status = MesaStatus::statusAberto();
        $mesa->mesaStatus()->associate($status);        
        $mesa->save();    

        return response()->json([
            'success' => 'Record has been deleted successfully!'
        ]);
    }
      
}
