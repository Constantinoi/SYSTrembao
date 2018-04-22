@extends('layouts.base')

@section('conteudo')
@can('Editar usuário') 
    @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
    @endif

        <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar usuário<small>edição de dados de um  usuário</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                        
                  <div class="x_content">
                  <br/>
                    <form class="form-horizontal" method="post" action="{{route ('user.update', $user->id)}}">  
                        {{ csrf_field() }} 
                        {{ method_field('PUT') }}         
                            
                        
                        @include('admin.user._user')

                        <div class="ln_solid"></div>
                    
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <a href="{{ route('user.index') }}" class="btn btn-primary">Voltar</a>
                                <button href="{{ url()->previous() }}" type="submit" class="btn btn-success">Atualizar                               
                                </button>                                
                            </div>
                        </div>

                    </form>
                  </div>                 
                </div>
              </div>
            </div>
        

@endcan
@endsection