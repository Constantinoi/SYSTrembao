@extends('layouts.base')

@section('conteudo')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dados  do Cliente</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Editar</a>
                          </li>
                          <li><a href="#">Excluir</a>
                          </li>
                        </ul>
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
                    <form action="{{route('cliente.store')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                    {{--  nome  --}}
                      <div class="form-group">
                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nome"  class="form-control col-md-7 col-xs-12" value="{{old('nome')}}" >
                        @if($errors->has('nome'))
                              <span class="help-block">
                                <strong>{{$errors->first('nome')}}</strong>
                              </span>
                            @endif
                        </div>
                      </div>
                      </div>
                      {{--  data  --}}
                      <div class="form-group">
                        <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
                        <label for="data_nascimento" class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="data_nascimento" class="date form-control col-md-7 col-xs-12" type="text" id="data_nascimento" value="{{old('data_nascimento')}}">
                          @if($errors->has('data_nascimento'))
                              <span class="help-block">
                                <strong>{{$errors->first('data_nascimento')}}</strong>
                              </span>
                            @endif
                        </div>
                      </div>
                      </div>
                      {{--  telefones  --}}
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-2">
                          <div class="form-group">
                            <label for="telefone_1" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_1" id="telefone_1"  value="{{old('telefone_1')}}" >
                              
                            </div>
                          </div>
                        </div>
                         <div class="col-md-4 col-sm-4 col-xs-6">
                          <div class="form-group">
                            <div class="form-group{{ $errors->has('telefone_2') ? ' has-error' : '' }}">
                            <label for="telefone_2" class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_2" id="telefone_2" classe="telefone"  value="{{old('telefone_2')}}">
                              @if($errors->has('telefone_2'))
                              <span class="help-block">
                                <strong>{{$errors->first('telefone_2')}}</strong>
                              </span>
                            @endif
                            </div>
                          </div>
                          </div>
                        </div>
                      </div>
                      {{--  observacao  --}}
                      <div class="form-group">
                        <label for="observacao" class="control-label col-md-3 col-sm-3 col-xs-12">Observações</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" type="text" name="observacao" row="5"  value="{{old('observacao')}}" >
                        </div>
                      </div>
                      {{--  cep  --}}
                      <div class="form-group">
                        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cep">Cep<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="cep" onblur="pesquisacep(this.value);" class="form-control col-md-7 col-xs-12" id="cep"  value="{{old('cep')}}">
                          @if($errors->has('cep'))
                              <span class="help-block">
                                <strong>{{$errors->first('cep')}}</strong>
                              </span>
                            @endif
                        </div>
                        </div>
                      </div>
                      {{--  logradouro  --}}
                      <div class="form-group">
                        <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logradouro">Logradouro<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="logradouro" required="required" id="logradouro" class="form-control col-md-7 col-xs-12"  value="{{old('logradouro')}}">
                          @if($errors->has('logradouro'))
                              <span class="help-block">
                                <strong>{{$errors->first('logradouro')}}</strong>
                              </span>
                            @endif
                        </div>
                        </div>
                      </div>
                      {{--  numero  --}}
                      <div class="row">                 
                        <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-2">
                          <div class="form-group">
                            <div class="form-group{{ $errors->has('num') ? ' has-error' : '' }}">
                            <label for="num" class="control-label col-md-3 col-sm-3 col-xs-12">Número<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="num" id="num"  value="{{old('num')}}">
                              @if($errors->has('num'))
                              <span class="help-block">
                                <strong>{{$errors->first('num')}}</strong>
                              </span>
                            @endif
                            </div>
                          </div>
                        </div>
                        </div>
                        {{--  bairro  --}}
                        <div class="col-md-4 col-sm-4 col-xs-6">
                          <div class="form-group">
                            <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                            <label for="bairro" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" id="bairro" name="bairro"  value="{{old('bairro')}}">
                              @if($errors->has('bairro'))
                                <span class="help-block">
                                  <strong>{{$errors->first('bairro')}}</strong>
                                </span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>
                      </div>
  
                     {{--  complemento  --}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="complemento"  class="form-control col-md-7 col-xs-12"  value="{{old('complemento')}}">
                        </div>
                    </div>
                      
                      <div class="ln_solid"></div>      

                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Cadastrar</button>
						              <button class="btn btn-primary" type="reset">Limpar</button>          
                      </div>

                    </form>           
                  </div>
              </div>
                                
                  </div>             
                </div>       
              </div>     
            </div>

@endsection