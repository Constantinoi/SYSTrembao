@extends('layouts.base')

@section('conteudo')
<a href="{{ route('papeis.index') }}" class="btn btn-primary">Voltar</a>
            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Permissões <small>Escolha a permissao</small></h2>
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
                        <form class="form-horizontal " action="{{route('papeis.permissao.store',$papel->id)}}" method="post">
                            {{ csrf_field() }}
                            @foreach($permissao as $permissao)
                                <tr>                          
                                    <td>{{$permissao->nome}}</td>
                                    <td>{{$permissao->descricao}}</td>
                                    <td> 
                                        <button name="permissao_id" class="btn btn-primary"  value="{{$permissao->id}}">Adicionar</button>
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
                    <h2>Permissões para {{$papel->nome}}<small></small></h2>
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
