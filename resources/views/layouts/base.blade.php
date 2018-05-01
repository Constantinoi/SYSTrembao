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
    <!-- Datatables -->
    <link href="{{asset('/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
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
              <a href="{{ route('home') }}" class="site_title"><i class="fa fa-cutlery"></i> <span>SysFood</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="#" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem Vindo,{{Auth::user()->name}}</span>
                <h2></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            
            
            <!-- sidebar menu -->
            @include('layouts._sidebar')            
            <!-- /sidebar menu -->
            
           
          </div>
        </div>

        <!-- top navigation -->
        @include('layouts._navbar')   
        <!-- /top navigation -->

        <!-- Conteudo -->
        
        <div class="right_col" role="main">
          
            @yield('conteudo')
          
          
        </div>        
        <!-- footer content -->
         @include('layouts._footer') 
        <!-- /footer content -->
    
        <!-- FimConteudo -->

         <!-- Modais -->
  

  

        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('jquery/dist/jquery.min.js')}}"></script>

    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
    <!-- filtros -->
    <script src="{{asset('js/filtros.js')}}"></script> 
    <!-- cep -->
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
    <script src="{{asset('pnotify/dist/pnotify.nonblock.js')}}"></script>

     <!-- Datatables -->
    <script src="{{asset('datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    
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
    
    @yield('scripts')
    <script>
     // ---------------- create ------------------- //
  //  $("#add").click( function() {
        
  //       $.ajax({
  //           type: 'POST',
  //           url: '/cliente/store',
  //           data: {
  //               nome :  $('input[name=nome]').val() ,
  //               data_nascimento:  $('input[name=data_nascimento]').val(),
  //               telefone_1:  $('input[name=telefone_1]').val(),
  //               telefone_2:  $('input[name=telefone_2]').val(),
  //               observacao:  $('input[name=observacao]').val(),
  //               cep:  $('input[name=cep]').val(),
  //               logradouro:  $('input[name=logradouro]').val(),
  //               num:  $('input[name=num]').val(),
  //               bairro:  $('input[name=bairro]').val()
  //             }     

  //           ,
  //           success: function(cliente){
                    
  //                   $('#cliente_id').append('<option value="'+cliente.id+'" selected>'+cliente.nome+'</option>');

  //                   $('#create').modal('hide');  
                   
  //           },
  //           erro: function(erro){              
  //               console.log(erro.response);
  //           }
  //       });
      
                      
  //   });
    </script>

  </body>
  
</html>