<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Tipo;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function validarTipo($request){
        $validator = Validator::make($request->all(),
            ["nome" => "required",
            "descricao" => "required",

        ]);
        return $validator;
    }
    public function index(Request $request)
    {
        if(Gate::denies('Manter Tipos')){
                    abort(403,"Não autorizado!");
        }  

        $qtd = $request['qtd'] ?: 10;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        if($buscar){
            $tipos = Tipo::where('tipo','=', $buscar)->paginate($qtd);
        }else{  
            $tipos = Tipo::paginate($qtd);

        }
        $tipos = $tipos->appends(Request::capture()->except('page'));
        return view('tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('tipos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validarTipo($request);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->erros());
        }

        $dados = $request->all(); // pega todas as informações do formulário e armazena em $dados
        $tipo = Tipo::create($dados);
        return redirect()->route('tipos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $tipos = Tipo::find($id);
        return view('tipos.show', compact('tipos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // verificar o relacionameto 1 N
         $tipos = Tipo::find($id);
         
        return view('tipos.edit', compact('tipos'));
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
        $validator = $this->validarTipo($request);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->erros());
        }

        $tipo = Tipo::find($id);
        $dados = $request->all();
        $tipo->update($dados);

        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tipo::find($id)->delete();
        return redirect()->route('tipos.index');
    }
    public function remover($id){
        $tipo = Tipo::find($id);
        return view('tipos.remove', compact('tipo'));
    }
}
