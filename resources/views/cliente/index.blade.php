
@extends('layouts.base')

@section('conteudo')
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dados do Cliente</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Data Nascimento</th>
                          <th>Celular</th>
                          <th>Telefone</th>
                          <th>Observação</th>
                          <th>Cep</th>
                          <th>Logradouro</th>
                          <th>Número</th>
                          <th>Bairro</th>
                          <th>Complemento</th>
                        </tr>
                      </thead>

                      <tbody>
                          @foreach ($clientes as $cliente)
                        <tr>
                            <td>{{$cliente->nome}}</td>
                            <td>{{date( 'd/m/Y', strtotime ($cliente->data_nascimento))}}</td>
                            <td>{{$cliente->telefone_1}}</td>                                                                 
                            <td>{{$cliente->telefone_2}}</td>
                            <td>{{$cliente->observacao}}</td>
                            <td>{{$cliente->endereco->cep}}</td>
                            <td>{{$cliente->endereco->logradouro}}</td>
                            <td>{{$cliente->endereco->num}}</td>
                            <td>{{$cliente->endereco->bairro}}</td>
                            <td>{{$cliente->endereco->complemento}}</td>
                            <td><li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="{{route('cliente.edit', $cliente->id)}}">Editar</a></li>
                          <li><a href="{{route('cliente.remove',$cliente->id)}}">Excluir</a></li>
                        </ul>
                      </li></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    <a href="{{route('cliente.create')}}"> <button class="btn btn-primary">Adicionar Cliente</button></a>
@endsection

