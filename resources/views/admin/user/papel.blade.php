@extends('layouts.base')

@section('conteudo')

    <div class="row col-md-8 col-sm-6 col-xs-12 ">
    <div class="x_panel">
		<div class="x_title"><h3>Lista de Papéis para {{$usuario->name}}</h3></div>

		        <div class="col-md-10  col-md-offset-1  ">
                <div class="panel panel">
                    <div class="panel-heading">
                        <h2 class="panel-title">Selecione o Papel </h2>
                    </div>
                    <form class="form-horizontal" action="{{route('user.papel.store',$usuario->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="input-field">
                            <select name="papel_id">
                                @foreach($papel as $valor)
                                <option value="{{$valor->id}}">{{$valor->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                            <button class="btn btn-success">Adicionar</button>
                            <a href="{{ route('user.index') }}" class="btn btn-primary">Voltar</a>
                    </form>
                </div>
            </div>

	
		<div class="row">
            <div class="col-md-10  col-md-offset-1">
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th>Papel</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($usuario->papeis as $papel)
                        <tr>
                            <td>{{ $papel->nome }}</td>
                            <td>{{ $papel->descricao }}</td>

                            <td>

                                <form action="{{route('user.papel.destroy',[$usuario->id,$papel->id])}}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button title="Deletar" class="btn btn-danger"><i class="material-icons">Apagar</i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
           
		</div>

	</div>
    </div>
    
@endsection
