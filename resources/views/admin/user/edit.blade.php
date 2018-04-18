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
<div class="container">
    <div class="row"> 
        <div class='col-md-8 col-md-offset-1'>
            <div class="panel panel-default">
              <div class="panel-heading"><h3>Edite o Usuário</h3></div>
                <div class="panel-body">
                    <div class="col-md-7  col-md-offset-2">
                        <form method="post" action="{{route ('user.update', $user->id)}}">  
                            {{ csrf_field() }} 
                            {{ method_field('PUT') }}         
                                <h4>Dados do Usuário</h4>
                                <hr>

                                <div class="input-field">
                                    <label for="name" class="col-md-4 control-label">Nome</label>                        
                                    <input id="name" type="text" class="form-control" name="name"  required value="{{$user->name}}" >
                                </div>
                            
                            <div class="form-group{{ $errors->has('email') ? ' contem algum erro no email' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>
                                    <input id="email" type="email" class="form-control" name="email" required value="{{$user->email}}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            
                            </div>

                            <div class="form-group{{ $errors->has('password') ? 'senha inválida' : '' }}">
                                <label for="password" class="col-md-4 control-label">Senha</label>

                                
                                    <input id="password" type="password" class="form-control" name="password" required >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>         
                                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                                    <button type="submit" class="btn btn-successs">Atualizar</button>
                            
                        </form>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>

@endcan
@endsection