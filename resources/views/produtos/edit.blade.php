@extends('layouts.base')

@section('conteudo')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar o Produto</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
    <div class="x_content">
                    <br>
                    <form action="{{route('produtos.update',$produto->id)}}" method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nome" required="required" class="form-control col-md-7 col-xs-12" value="{{$produto->nome}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="descricao" class="control-label col-md-3 col-sm-3 col-xs-12">Descrição</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" type="text" name="descricao" row="5"  value="{{$produto->descricao}}">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="valor">Valor<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="valor" id="valor" class="form-control col-md-7 col-xs-12" value="{{$produto->valor}}">
                        </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipo_id">Selecione a tipo: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="tipo_id" required>
                                @foreach($tipo as $dado)            
                                  <option value="{{$dado->id}}"
                                    {{(isset($produto->tipo_id) && $produto->tipo_id == $dado->id ?'selected' : '')}}>{{$dado->nome}} 
                                  </option>      
                                @endforeach
                              </select>
                          </div>   
                    </div> 
                      <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="produto_status_id">Status: </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <select class="form-control" name="produto_status_id" required>
                                @foreach($statusProduto as $status)            
                                  <option value="{{$status->id}}"
                                    {{(isset($produto->produto_status_id) && $produto->produto_status_id == $status->id ?'selected' : '')}}>{{$status->nome}} 
                                  </option>      
                                @endforeach
                              </select>
                          </div>   
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" > 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           
                              <img width="200px" src="{{ url($produto->imagem) }}" alt="" />
                           
                        </div>
                      </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="imagem"> Imagem
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type='file' id="imagem" name="imagem" value="{{url($produto->imagem)}}">
                        </div>
                      </div>                     
                      <div class="ln_solid"></div>                 
                  </div>
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{route('produtos.index') }}" class="btn btn-primary">Voltar</a>  
                          <button type="submit" class="btn btn-success">Editar</button>						                     
                      </div>
                </div>
                     
                    </form>
                     
                  </div>             
                </div>       
              </div>     
            </div>

@endsection