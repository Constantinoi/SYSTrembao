<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\ProdutoRequest;
use App\Produto;
use App\TipoProduto;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Intervention\Image\ImageManagerStatic as Image; 
use Illuminate\Support\Facades\Gate;


class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        // if(Gate::denies('Manter Produtos')){
        //     abort(403,"Não autorizado!");
        // } 

        $qtd = $request['qtd'] ?: 8;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
 
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
 
        if($buscar){
            $produtos = Produto::where('nome','=', $buscar)->paginate($qtd);
        }else{  
            $produtos =Produto::paginate($qtd);
 
        }
        $produtos = $produtos->appends(Request::capture()->except('page'));
        return view('produtos.index', compact('produtos','tipo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
    
        $produtos = Produto::all();
        $tipos = TipoProduto::all();
        return view('Produtos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $this->Validate($request,[
            
            'imagem'=> 'image',
    
        ]);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
        $produto = Produto::find($id);
 
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $tipo = TipoProduto::all();
       $produto = Produto::find($id);
 
        return view('produtos.edit', compact('produto','tipo'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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