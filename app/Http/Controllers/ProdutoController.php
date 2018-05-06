<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdutoRequest;
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
      
        $statusProduto = ProdutoStatus::all();
        $tipos = TipoProduto::all();
        return view('produtos.create', compact('tipos','statusProduto'));
    }

   
    public function store(ProdutoRequest $request){


        $dados = $request->all();   

        if($request->hasFile('imagem')){
            $imagem = $request->file('imagem');
            $imagem_nome = time().'.'.$imagem->getClientOriginalExtension();
            Image::make($imagem)->save(public_path('imagem/'.$imagem_nome ) );
                    
            $dados['imagem']= ("imagem/".$imagem_nome);
        }else{
            $dados['imagem']= ("imagem/vazio.jpg");
        }
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
       
       $tipo = TipoProduto::all();
       $statusProduto = ProdutoStatus::all();
       $produto = Produto::find($id);
 
        return view('produtos.edit', compact('produto','tipo','statusProduto'));
    }

  
   
    
    public function update(ProdutoRequest $request, $id)
    {
 
        $produto = Produto::find($id);
                
        $dados = $request->all();
        if($request->hasFile('imagem')){

        $imagem = $request->file('imagem');
        $imagem_nome = time().'.'.$imagem->getClientOriginalExtension();
        Image::make($imagem)->save(public_path('imagem/'.$imagem_nome ) );
                
        $dados['imagem']= ("imagem/".$imagem_nome);
        
        }
        $produto->update($dados);           
        
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