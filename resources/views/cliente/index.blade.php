
@extends('layouts.base')

@section('conteudo')    
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Clientes<small>Lista de Clientes</small></h2>
                    <div class="box-tools pull-right" > 
                        <a class="btn btn-success" href="{{ route('cliente.create') }}">
                            <i class="fa fa-plus"></i>
                            Novo
                        </a>                    
                    </div>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"  cellspacing="0" width="100%">
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
                          <th>Ações</th>
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
                            <td>                            
                                <a class="btn btn-info btn-xs" href="{{route('cliente.edit', $cliente->id)}}">Editar</a>
                                <a class="btn btn-danger btn-xs" href="{{route('cliente.remove',$cliente->id)}}">Excluir</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- <a href="{{route('cliente.create')}}"> <button class="btn btn-primary">Adicionar Cliente</button></a> -->
                  </div>
                </div>
              </div>
   
@endsection

