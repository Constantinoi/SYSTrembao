@extends('layouts.base')

@section('conteudo')

            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Papéis <small>Stripped table subtitle</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                                        <a title="Editar" class="btn btn-primary btn-xs" href="{{ route('papeis.edit',$registro->id) }}">Editar</a>
                                        <a title="Permissões" class="btn btn-primary btn-xs" href="{{route('papeis.permissao',$registro->id)}}">Permissoes</a>
                                        @endcan
                                        @can('Deletar papel')
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button title="Deletar" class="btn btn-danger btn-xs">Apagar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    
                       
                      </tbody>
                    </table>
                    @can('Administrador')
                    <div class="ln_solid"></div>

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{ route('admin.index') }}" class="btn btn-primary">Voltar</a>    
                          <a class="btn btn-success" href="{{route('papeis.create')}}">Adicionar</a>                          
                        </div>
                      </div>
                    @endcan 
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>


@endsection
