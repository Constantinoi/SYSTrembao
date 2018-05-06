<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\ProdutoRequest;
use App\Produto;
use App\TipoProduto;
use App\ProdutoStatus;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Intervention\Image\ImageManagerStatic as Image; 
use Illuminate\Support\Facades\Gate;


class ProdutoController extends Controller
{
   
    public function index(Request $request){
        // if(Gate::denies('Manter Produtos')){
        //     abort(403,"Não autorizado!");
        // } 
        $statusAtivo = ProdutoStatus::produtosAtivos();
        if($request->ajax()){
            $filtro  = $request->input('filtro');

            $produtos = Produto::where([
                ['produto_status_id', '=', $statusAtivo],
                ['tipo_produto_id', '=', $filtro]
                ])->get()->sort();
            return (response()->json($produtos));          

        }else{            
            $produtos = Produto::all();
            return view('produtos.index', compact('produtos','tipo'));
        }
    }

   
    public function create(){
        //status
        $tipos = TipoProduto::all();
        return view('produtos.create', compact('tipos'));
    }

   
    public function store(Request $request){

        
        $dados = $request->all();   
        $request->hasFile('imagem');
        $imagem = $request->file('imagem');
        $imagem_nome = time().$imagem->getClientOriginalName();
        $imagem->move("imagem/",$imagem_nome);
        
       $imagem = Image::make("imagem/".$imagem_nome)->resize(198,141)->save("imagem/_pequena".$imagem_nome);
        
       $auxNome = ("imagem/_pequena".$imagem_nome);
        
        $dados['imagem']= $auxNome;

        Produto::create($dados);

        return redirect()->route('produtos.index');
    }

   
    public function show($id)
    {
         
        $produto = Produto::find($id);
 
        return view('produtos.show', compact('produto'));
    }

   
    public function edit($id)
    {
       // status
       $tipo = TipoProduto::all();
       $produto = Produto::find($id);
 
        return view('produtos.edit', compact('produto','tipo'));
    }

  
    public function update(Request $request, $id)
    {
 
        $produto = Produto::find($id);

        $imagem = $request->file('imagem');
        $imagem_nome = time().$imagem->getClientOriginalName();
        $imagem->move("imagens/",$imagem_nome);

        $tipo=TipoProduto::find($produto->tipo_id);

        $dados = $request->all();
        $produto->update($dados);
        $tipo->update($dados);

        
         
        return redirect()->route('produtos.index');
    
    }

  
    public function destroy($id)
    {
        Produto::find($id)->delete();
        return redirect()->route('produtos.index');
    }
    public function remover($id)
    {
        $produto = Produto::find($id);
        

 
        return view('produtos.remove', compact('produto'));
    }
    
    
}