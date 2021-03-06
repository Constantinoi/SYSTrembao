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


        $clientes = Cliente::all(); 
        
        return view('cliente.index', compact('clientes'));
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
        
        if($request->ajax()){
            $dados = $request->all();
            // $nome = $request->nome ,
            // $data_nascimento$request->data_nascimento,
            // $telefone_1    telefone_1,
            // $telefone_2    telefone_2,
            // $observacao    observacao,
            // $cep    cep,
            // $logradouro    logradouro,
            // $num    num,
            // $bairro    bairro
            
    
            $dados = $request->all();           
            Cliente::create($dados);
            return redirect()->route('cliente.index');

         }
         else{

        $dados = $request->all();           
        Cliente::create($dados);
        return redirect()->route('cliente.index');

        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }  
       

        if($request->ajax()){
            $find = $request->input('id');
            $cliente = Cliente::find($find);
            return response()->json($cliente);
        }else{
            $cliente = Cliente::find($id); 
            return view('cliente.show', compact('cliente'));
        }
        
 
        
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
       
       $cliente = Cliente::find($id);
       
 
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        if(Gate::denies('Manter Clientes')){
            abort(403,"Não autorizado!");
        }   
 
        $cliente = Cliente::find($id);
        

        $dados = $request->all();
        $cliente->update($dados);
      
         
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