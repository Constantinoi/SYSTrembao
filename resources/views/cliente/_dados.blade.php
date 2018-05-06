                        {{--  nome  --}}
                      <div class="form-group">
                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nome"  class="form-control col-md-7 col-xs-12" value="{{   old('nome')  }}"   >
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
                        <label for="data_nascimento" class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="data_nascimento" class="date form-control col-md-7 col-xs-12" type="text" id="data_nascimento" value="{{  old('data_nascimento')  }}">
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
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_1" id="telefone_1"  value="{{   old('telefone_1')  }}" >
                              
                            </div>
                          </div>
                        </div>
                         <div class="col-md-4 col-sm-4 col-xs-6 ">
                          <div class="form-group">
                            <div class="form-group{{ $errors->has('telefone_2') ? ' has-error' : '' }}">
                            <label for="telefone_2" class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_2" id="telefone_2" classe="telefone"  value="{{ old('nome')  }}">
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
                          <input  class="form-control col-md-7 col-xs-12" type="text" name="observacao" row="5"  value="{{  old('observacao')  }}" >
                        </div>
                      </div>
                      {{--  cep  --}}
                      <div class="form-group">
                        <div class="form-group{{ $errors->has('cep') ? ' has-error' : '' }}">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cep">Cep</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="cep" onblur="pesquisacep(this.value);" class="form-control col-md-7 col-xs-12" id="cep"  value="{{ old('endereco')  }}">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logradouro">Logradouro
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="logradouro"  id="logradouro" class="form-control col-md-7 col-xs-12"  value="{{   old('endereco')  }}">
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
                            <label for="num" class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="num" id="num"  value="{{   old('num')  }}">
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
                            <label for="bairro" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" id="bairro" name="bairro"  value="{{  old('bairro')  }}">
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
                          <input type="text" name="complemento"  class="form-control col-md-7 col-xs-12"  value="{{   old('complemento')  }}">
                        </div>
                    </div>
    
    
    