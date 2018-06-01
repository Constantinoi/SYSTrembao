@extends('layouts.base')

@section('conteudo')
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar o Endereco</h2>
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
                    <form action="{{route('enderecos.update',$endereco->id)}}" method="post"  class="form-horizontal form-label-left">
                      <input type="hidden" name="_method" value="PUT">
                      {{ csrf_field() }}

                      {{--  cep  --}}
                      <div class="form-group">
                        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cep">Cep<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="cep" onblur="pesquisacep(this.value);" class="form-control col-md-7 col-xs-12" id="cep"  value="{{ isset($endereco->cep) ? $endereco->cep :  old('endereco')  }}">
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
                          <input type="text" name="logradouro"  id="logradouro" class="form-control col-md-7 col-xs-12"  value="{{ isset($endereco->logradouro) ? $endereco->logradouro :  old('endereco')  }}">
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
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="num" id="num"  value="{{ isset($endereco->num) ? $endereco->num :  old('num')  }}">
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
                              <input  class="form-control col-md-7 col-xs-12" type="text" id="bairro" name="bairro"  value="{{ isset($endereco->bairro) ? $endereco->bairro :  old('bairro')  }}">
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
                          <input type="text" name="complemento"  class="form-control col-md-7 col-xs-12"  value="{{ isset($endereco->complemento) ? $endereco->complemento :  old('complemento')  }}">
                        </div>
                    </div>
                    
                      <div class="ln_solid"></div>   

                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Editar</button>
						             <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>         
                      </div>
                    </form>             
                  </div>
                </div>
              </div>             
            </div>       
          </div>     
        </div>                
                   
                
                     
                   
                     
            

@endsection