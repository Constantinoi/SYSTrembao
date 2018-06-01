<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnderecoRequest;
use App\Endereco;
use App\Cliente;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
     $cliente = Cliente::find($id); 
     $endereco = Endereco::all();
     return view('enderecos.index',compact('endereco','cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Cliente $cliente)
    {
        
        return view('enderecos.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnderecoRequest $request)
    {
        
        $cliente_id = $request->input('cliente_id');
        $dados = $request->all(); 
        Endereco::create($dados);
        return redirect()->route('enderecos.index',$cliente_id);
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
        $endereco=Endereco::find($id);
        return view('enderecos.edit',compact('endereco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnderecoRequest $request, $id)
    {
        $endereco = Endereco::find($id);
        $dados = $request ->all();
        $endereco->update($dados);
         return redirect()->route('enderecos.index',$cliente_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = Endereco::find($id);
        $cliente_id= $endereco->cliente->id;
        $endereco->delete();
        
         return redirect()->route('enderecos.index',$cliente_id);
    }
    public function remover($id){
        $endereco = Endereco::find($id);
        return view('enderecos.remove', compact('endereco'));
    }
}
