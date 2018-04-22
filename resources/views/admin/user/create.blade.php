@extends('layouts.base')

@section('conteudo')    
@can('Criar usuário')
        <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Criar usuário<small>cadastro de um novo usuário</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                        
                  <div class="x_content">
                  <br/>
                    <form class="form-horizontal" method="POST" action="{{ route('user.store') }}">
                        {{ csrf_field() }}

                         @include('admin.user._user')

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Senha</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password" type="password" class="form-control col-md-7 col-xs-12" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label col-md-3 col-sm-3 col-xs-12">Confirmar Senha</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="password-confirm" type="password" class="form-control col-md-7 col-xs-12" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('user.index') }}" class="btn btn-primary">Voltar</a>
                                <button class="btn btn-warning" type="reset">Limpar</button>
                                <button  type="submit" class="btn btn-success">Registrar</button>                              
                            </div>
                        </div>

                    </form>
                  </div>                 
                </div>
              </div>
            </div>

@endcan  

@endsection