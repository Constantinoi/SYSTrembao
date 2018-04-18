<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SysFood</title>

    <!-- Bootstrap -->
    <link href="{{ asset ('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
  </head>
    <body >
    <div>
        <div class="animate form registration_form">
            <section >
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>Criar  Conta</h1>               
            
                    <div >
                        <input id="name" type="text" placeholder="Informe seu nome aqui" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  >

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>                

                    <div >
                        <input id="email" type="email" placeholder="Informe seu email aqui" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
        
                    <div >
                        <input id="password" type="password"  placeholder="Informe sua senha aqui" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div >
                        <input id="password-confirm" type="password"  placeholder="Confirme sua senha aqui" class="form-control" name="password_confirmation" required>
                    </div>
                

                    <div>                    
                        <button type="submit" class="btn btn-default">
                            {{ __('Registrar') }}
                        </button>                    
                    </div>
                    <div class="separator">

                        <p class="change_link">Já possui cadastro ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-cutlery"></i> SysFood!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                    </div>
                
                </form>
            </section>
        </div> 
        </div>       
    </body>
</html>

