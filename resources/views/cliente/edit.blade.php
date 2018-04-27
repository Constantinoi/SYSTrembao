@extends('layouts.base')

@section('conteudo')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar o Cliente</h2>
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
                    <br />
                    <form action="{{route('cliente.update',$cliente->id)}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    {{--  nome  --}}
                      <div class="form-group">
                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nome"  class="form-control col-md-7 col-xs-12" value="{{$cliente->nome}}">
                          @if($errors->has('nome'))
                                <span class="help-block">
                                  <strong>{{$errors->first('nome')}}</strong>
                                </span>
                              @endif
                        </div>
                      </div>
                      </div>
                      {{--  data nascimento  --}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('data_nascimento') ? ' has-error' : '' }}">
                          <input name="data_nascimento" id="data_nascimento" class="date form-control col-md-7 col-xs-12"  type="text" value="{{date( 'd/m/Y', strtotime ($cliente->data_nascimento))}}">
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
                              <input  class="form-control col-md-7 col-xs-12" type="text" id="telefone_1"  name="telefone_1" value="{{$cliente->telefone_1}}">
                            </div>
                          </div>
                        </div>
                         <div class="col-md-4 col-sm-4 col-xs-6">
                          <div class="form-group">
                            <div class="form-group{{ $errors->has('telefone_2') ? ' has-error' : '' }}">
                            <label for="telefone_2" class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_2" id="telefone_2" value="{{$cliente->telefone_2}}">
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
                          <input  class="form-control col-md-7 col-xs-12" type="text" name="observacao" row="5"  value="{{$cliente->observacao}}">
                        </div>
                      </div>
                      {{--  cep  --}}
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cep">Cep</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                          <input type="text" name="cep" id="cep"   onblur="pesquisacep(this.value);" class="form-control col-md-7 col-xs-12"  value="{{$cliente->endereco->cep}}">
                           @if($errors->has('ceptelefone_2'))
                              <span class="help-block">
                                <strong>{{$errors->first('ceptelefone_2')}}</strong>
                              </span>
                            @endif
                        </div>
                        </div>
                      </div>
                      {{--  logradouro  --}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logradouro">Logradouro</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="form-group{{ $errors->has('logradouro') ? ' has-error' : '' }}">
                          <input type="text" name="logradouro"  class="form-control col-md-7 col-xs-12" value="{{$cliente->endereco->logradouro}}">
                           @if($errors->has('logradouro'))
                              <span class="help-block">
                                <strong>{{$errors->first('logradouro')}}</strong>
                              </span>
                            @endif
                        </div>
                      </div>
           {{--  numero  --}}
                        <div class="row">
                          <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-2">
                          <div class="form-group">
                            <div class="form-group{{ $errors->has('num') ? ' has-error' : '' }}">
                            <label for="numero" class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="num" id="num" value="{{$cliente->endereco->num}}">
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
                        <div class=" col-sm-4 ">
                          <div class="form-group">
                            <div class="form-group{{ $errors->has('bairro') ? ' has-error' : '' }}">
                            <label for="numero" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="bairro" value="{{$cliente->endereco->bairro}}" >
                               @if($errors->has('bairro'))
                              <span class="help-block">
                                <strong>{{$errors->first('bairro')}}</strong>
                              </span>
                            @endif
                            </div>
                          </div>
                        </div>
                        </div>
                     {{--  complemento  --}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Complemento</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="complemento" class="form-control col-md-7 col-xs-12" value="{{$cliente->endereco->complemento}}">
                        </div>
                    </div>
                      
                      <div class="ln_solid"></div>                 
                  </div>
              </div>
               
                 
                   
                
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Editar</button>
						             <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>         
                      </div>
                    </form>
                     
                  </div>             
                </div>       
              </div>     
            </div>

@endsection