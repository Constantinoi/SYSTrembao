<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\User;
use App\Papel;
use App\Permissao;
use Validator;

class PapelController extends Controller
{ public function index()
    {
      
      if(Gate::denies('Lista de papéis')){
        abort(403,"Não autorizado!");
      }

      $registros = Papel::all();
      
      return view('admin.papel.index',compact('registros'));
    }

    public function permissao($id)
    {
      if(Gate::denies('Editar papel')){
        abort(403,"Não autorizado!");
      }

      $papel = Papel::find($id);
      $permissao = Permissao::all();
    
      return view('admin.papel.permissao',compact('papel','permissao'));
    }

    public function permissaoStore(Request $request,$id)
    {
        if(Gate::denies('Editar papel')){
          abort(403,"Não autorizado!");
        }
        $papel = Papel::find($id);
        $dados = $request->all();
        $permissao = Permissao::find($dados['permissao_id']);
        $papel->adicionaPermissao($permissao);
        return redirect()->back();
    }

    public function permissaoDestroy($id,$permissao_id)
    {
      if(Gate::denies('Editar papel')){
        abort(403,"Não autorizado!");
      }

      $papel = Papel::find($id);
      $permissao = Permissao::find($permissao_id);
      $papel->removePermissao($permissao);
      return redirect()->back();
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if(Gate::denies('Criar papel')){
        abort(403,"Não autorizado!");
      }

      

      return view('admin.papel.adicionar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if(Gate::denies('Criar papel')){
        abort(403,"Não autorizado!");
      }

      // if($request['nome'] && $request['nome'] != "Admin"){
          Papel::create($request->all());

          return redirect()->route('papeis.index');
      // }

      // return redirect()->back();
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
      if(Gate::denies('Editar papel')){
        abort(403,"Não autorizado!");
      }
      if(Papel::find($id)->nome == "Admin"){
          return redirect()->route('papeis.index');
      }

      $registro = Papel::find($id);

     

      return view('admin.papel.editar',compact('registro'));
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
      if(Gate::denies('Editar papel')){
        abort(403,"Não autorizado!");
      }

      if(Papel::find($id)->nome == "Admin"){
          return redirect()->route('papeis.index');
      }
      if($request['nome'] && $request['nome'] != "Admin"){
        Papel::find($id)->update($request->all());
      }

      return redirect()->route('papeis.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      if(Gate::denies('Deletar papel')){
        abort(403,"Não autorizado!");
      }

      if(Papel::find($id)->nome == "Admin"){
          return redirect()->route('papeis.index');
      }
      Papel::find($id)->delete();
      return redirect()->route('papeis.index');
    }
}
