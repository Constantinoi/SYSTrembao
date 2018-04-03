<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TremBão </title>

    <!-- Bootstrap -->
    <link href="{{ asset ('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{asset('/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    
    <!-- PNotify 
    <link href="{{asset('pnotify/dist/pnotify.css')}}" rel="stylesheet">
    <link href="{{asset('pnotify/dist/pnotify.buttons.css')}}" rel="stylesheet">
    <link href="{{asset('pnotify/dist/pnotify.nonblock.css')}}" rel="stylesheet">
    -->

    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-cutlery"></i> <span>Trêm Bão!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="#" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem Vindo,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            
        
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Painel do Admin</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-list"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('pedido.create') }}">Iniciar Pedido</a></li>
                      <li><a href="#">Lista de Pedidos</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-cutlery"></i> Produtos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Cadastrar Produto</a></li>
                      <li><a href="#">Lista de Produtos</a></li>
                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('cliente.create')}}">Cadastrar Cliente</a></li>
                      <li><a href="{{route('cliente.index')}}">Lista de Clientes</a></li>             
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

           
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="#" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configurações</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ajuda</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="#" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                   
                   
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
   
        <!-- /top navigation -->

        <!-- Conteudo -->
        
        <div class="right_col" role="main">
          <div class="">
            @yield('conteudo')

          </div>
          <div class="clearfix"></div>
        </div> 
        
    

        <!-- FimConteudo -->
    <!-- jQuery -->
    <script src="{{asset('jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <!-- filtros -->
    <script src="{{asset('js/filtros.js')}}"></script> <!-- cep -->
    <script src="{{asset('js/mask.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('iCheck/icheck.min.js')}}"></script>
    <!-- PNotify -->
    <script src="{{asset('pnotify/dist/pnotify.js')}}"></script>
    <script src="{{asset('pnotify/dist/pnotify.buttons.js')}}"></script>
    <script src="{{('pnotify/dist/pnotify.nonblock.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>  
    
    <!-- Carrinho de compras -->
    <script src="{{asset('js/shoppingCart.js')}}"></script>

    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
    </script>
    
    @yield('scripts');

      </div>
      <div class="clearfix"></div>s
    </div>
  </body>
  
</html>