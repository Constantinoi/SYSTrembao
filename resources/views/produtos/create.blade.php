@extends('layouts.base')

@section('conteudo')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dados  do Produto</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>       
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
    <div class="x_content">
                    <br />
                    @if(count($errors) > 0)
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li>
                              {{$error}}
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                    <form action="{{route('produtos.store')}}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagem"> Imagem
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type='file' id="imagem" name="imagem">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nome"  class="form-control col-md-7 col-xs-12" value="{{old('nome')}}" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descricao"> Descricao <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="descricao"  class="form-control col-md-7 col-xs-12" value="{{old('descricao')}}" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor"> Valor <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="valor"  class="form-control col-md-7 col-xs-12" value="{{old('valor')}}" required="required">
                        </div>
                      </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_produto_id">Selecione a tipo: </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="tipo_produto_id" required>
                      @foreach($tipos as $tipo)            
                        <option value="{{$tipo->id}}">{{$tipo->nome}}</option>      
                      @endforeach
                      </select>
                    </div>   
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="produto_status_id">Status: </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="form-control" name="produto_status_id" required>
                      @foreach($produto_status as $dado)            
                        <option value="{{$dado->id}}">{{$dado->nome}}</option>      
                      @endforeach
                      </select>
                    </div>   
                    </div>

                      <div class="ln_solid"></div>                 
              </div>
              </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Cadastrar</button>
						              <button class="btn btn-primary" type="reset">Limpar</button>          
                      </div>
                    </form>
                     
                  </div>             
                </div>       
              </div>     
            </div>

@endsection