@extends('layouts.base')

@section('conteudo')
            <div class="col-md-10 col-sm-10 col-xs-12"  >
              <a href="{{ route('user.index') }}" class="btn btn-primary">Voltar</a>
            </div>
            
            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Papéis <small>Selecione o Papel</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="" class="table">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Descrição</th>
                          <th>Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form class="form-horizontal" action="{{route('user.papel.store',$usuario->id)}}" method="post">
                            {{ csrf_field() }}
                            @foreach($papel as $valor)
                                <tr>                          
                                    <td>{{$valor->nome}}</td>
                                    <td>{{$valor->descricao}}</td>
                                    <td> 
                                        <button name="papel_id" class="btn btn-primary"  value="{{$valor->id}}">Adicionar</button>
                                    </td>
                                </tr>
                            @endforeach
                        </form>
                      </tbody>
                    </table>                 

                  </div>
                </div>
              </div>

              <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Papéis para {{$usuario->name}}<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="" class="table">
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

    
    
@endsection
