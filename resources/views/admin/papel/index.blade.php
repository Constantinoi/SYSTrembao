@extends('layouts.base')

@section('conteudo')

  <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Papéis <small>Stripped table subtitle</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Ação</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($registros as $registro)
                            <tr>
                                <td>{{ $registro->id }}</td>
                                <td>{{ $registro->nome }}</td>
                                <td>{{ $registro->descricao }}</td>
                                <td>
                                    <form action="{{route('papeis.destroy',$registro->id)}}" method="post">
                                        @can('Editar papel')
                                        <a title="Editar" class="btn btn-primary" href="{{ route('papeis.edit',$registro->id) }}">Editar</a>
                                        <a title="Permissões" class="btn btn-primary" href="{{route('papeis.permissao',$registro->id)}}">Permissoes</a>
                                        @endcan
                                        @can('Deletar papel')
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button title="Deletar" class="btn btn-danger">Apagar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    
                       
                      </tbody>
                    </table>
                    @can('Criar papel')
                        <a class="btn btn-success" href="{{route('papeis.create')}}">Adicionar</a>
                        <a href="{{ route('admin.index') }}" class="btn btn-primary">Voltar</a>
                    @endcan 
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>


@endsection
