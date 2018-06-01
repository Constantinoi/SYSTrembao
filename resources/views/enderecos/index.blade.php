
@extends('layouts.base')

@section('conteudo')    
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Endereços de <b>{{$cliente->nome}}</b></h2>
                    <div class="box-tools pull-right" > 
                      <a class="btn btn-success" href="{{route('enderecos.create',$cliente->id)}}">
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
                          <th>Cep</th>
                          <th>logradouro</th>
                          <th>numero</th>
                          <th>bairro</th>
                          <th>Complemento</th>                                            
                          <th>Ações</th>                                            
                        </tr>
                      </thead>

                      <tbody>
                          @foreach ($endereco as $endereco)
                        <tr>
                            <td>{{$endereco->cep}}</td>    
                            <td style="text-transform:uppercase">{{$endereco->logradouro}}</td>                                                           
                            <td>{{$endereco->num}}</td>
                            <td style="text-transform:uppercase">{{$endereco->bairro}}</td>                        
                            <td style="text-transform:uppercase">{{$endereco->complemento}}</td>                        
                            <td>
                              <a class="btn btn-info btn-xs" href="{{route('enderecos.edit', $endereco->id)}}">Editar</a>
                              <a class="btn btn-danger btn-xs" href="{{route('enderecos.remove',$endereco->id)}}">Excluir</a>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


@endsection