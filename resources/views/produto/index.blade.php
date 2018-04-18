
@extends('layouts.base')

@section('conteudo')
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produtos</h2>
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
                          <th>Descrição</th>
                          <th>Valor</th>
                        </tr>
                      </thead>

                      <tbody>
                          @foreach ($produto as $dado)
                        <tr>
                            <td>{{$dado->nome}}</td>
                            <td>{{$dado->descricao}}</td>                                                                 
                            <td>{{$dado->valor}}</td>
                            <td>
                                <a href="#" class="show-modal" data-id="{{$dado->id}}" data-nome="{{$dado->nome}}" data-descricao="{{$dado->descricao}}" data-valor="{{$dado->valor}}"><i class="fa fa-eye"></i></a>
                                <a href="#"><i class="fa  fa-pencil" data-id="{{$dado->id}}" data-nome="{{$dado->nome}}" data-descricao="{{$dado->descricao}}" data-valor="{{$dado->valor}}" ></i></a>
                                <a href="#"><i class="fa fa-trash-o" data-id="{{$dado->id}}" data-nome="{{$dado->nome}}" data-descricao="{{$dado->descricao}}" data-valor="{{$dado->valor}}" ></i></a>
                                
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    <a href="#"> <button class="create-modal btn btn-primary">Adicionar Produto</button></a>

    {{-- Modal Create--}}

    <div id="create" class="modal fade" role="dialog ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group row add">
                            <label class="control-label col-sm-2" for="nome">Nome:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome do Produto" required>
                                <p class="error text-center alert alert-danger hidden">
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="descricao">Descrição:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" required>
                                <p class="error text-center alert alert-danger hidden">
                            </div>
                        </div>   
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="valor">Valor:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="valor" name="valor" placeholder="Informe o Valor" required>
                                <p class="error text-center alert alert-danger hidden">
                            </div>
                        </div>   
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="button" id="add" class="btn btn-warning">
                        <span class="glyphicon glyphicon-plus"></span>Cadastrar Produto
                    </button>
                    <button type="button" name="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>Fechar
                    </button>
                </div>
            </div>
        </div>   
    </div>

    {{--  Form show model post  --}}

    <div id="show" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p>Nome: {{$dado->nome}}</p>
                <p>Descrição: {{$dado->descricao}}</p>
                <p>Valor: {{$dado->valor}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-earning" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove">Fechar</span>
                </button>
            </div>
            </div>
        </div>
    </div>
@endsection

 