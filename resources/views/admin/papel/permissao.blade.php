@extends('layouts.base')

@section('conteudo')
<div class="panel panel-default">    
    <div class="panel-heading">Lista de Permissões para {{$papel->nome}}</div>	
    
		<div class="panel-body">
			<form class="form-horizontal col-md-4" action="{{route('papeis.permissao.store',$papel->id)}}" method="post">
			{{ csrf_field() }}
                <div >
                    <label> Escolha a permissao </label>
                    <select class="form-control" name="permissao_id">
                        @foreach($permissao as $valor)
                        <option class="form-group" value="{{$valor->id}}">{{$valor->nome}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-success">Adicionar</button>
                <a href="{{ route('papeis.index') }}" class="btn btn-primary">Voltar</a>
			</form>


		</div>

		<div class="row">
            <div class="form-group col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>

                            <th>Permissão</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($papel->permissoes as $permissao)
                        <tr>
                            <td>{{ $permissao->nome }}</td>
                            <td>{{ $permissao->descricao }}</td>

                            <td>

                                <form class="form-group" action="{{route('papeis.permissao.destroy',[$papel->id,$permissao->id])}}" method="post">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button title="Deletar" class="btn btn-danger">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
               
            </div>
           
		</div>

	</div>

@endsection
