<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Cliente;
use App\Endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   

        $qtd = $request['qtd'] ?: 8;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];
 
        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });
 
        if($buscar){
            $clientes = Cliente::where('nome','=', $buscar)->paginate($qtd);
        }else{  
            $clientes = Cliente::paginate($qtd);
 
        }
        $clientes = $clientes->appends(Request::capture()->except('page'));
        return view('cliente.index', compact('clientes','endereco'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   
        //$enderecos = Endereco::all();
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   
        $dados = $request->all();

        //dd($dados);
        $endereco = Endereco::create($dados);
        $dados['endereco_id'] = $endereco->id;

        Cliente::create($dados,'endereco_id');

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   
        $cliente = Cliente::find($id);
 
        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   
       $endereco = Endereco::all();
       $cliente = Cliente::find($id);
 
        return view('cliente.edit', compact('cliente','endereco'));
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
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   
 
        $cliente = Cliente::find($id);
        $endereco=Endereco::find($cliente->endereco_id);

        $dados = $request->all();
        $cliente->update($dados);
        $endereco->update($dados);

        
         
        return redirect()->route('cliente.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   
        Cliente::find($id)->delete();
        return redirect()->route('cliente.index');
    }
    public function remover($id)
    {
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   
        $cliente = Cliente::find($id);
        

 
        return view('cliente.remove', compact('cliente'));
    }
    
    
}