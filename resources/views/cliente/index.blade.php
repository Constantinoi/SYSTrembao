
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
                          <th>Telefone</th>
                          <th>Celular</th>
                          <th>Observação</th>
                          <th>Endereços</th>
                          <th>Ações</th>

                        </tr>
                      </thead>

                      <tbody>
                          @foreach ($clientes as $cliente)
                        <tr>
                            <td style="text-transform:uppercase">{{$cliente->nome}}</td>    
                            <td>{{$cliente->telefone_1}}</td>                                                           
                            <td>{{$cliente->telefone_2}}</td>
                            <td style="text-transform:uppercase">{{$cliente->observacao}}</td>                        
                            <td>
                              <a class="btn btn-success btn-xs" href="{{route('enderecos.index',$cliente->id)}}">Enderecos</a></td>
                            <td>
                              <a href="{{route('cliente.edit', $cliente->id)}}"></a>
                              <a class="btn btn-info btn-xs" href="{{route('cliente.edit', $cliente->id)}}">Editar</a>
                              <a class="btn btn-danger btn-xs" href="{{route('cliente.remove',$cliente->id)}}">Excluir</a>
                             
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


@endsection