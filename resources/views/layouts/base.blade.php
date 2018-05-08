<!DOCTYPE html>
<html lang="pt-br">

  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SysFood </title>

  
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
    <!-- Switchery -->
    <link href="{{asset('/switchery/dist/switchery.min.css')}}" rel="stylesheet">
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
        <div class="col-md-3 left_col menu_fixed">
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
    <!-- preview -->
    <script src="{{asset('js/html5.image.preview.js')}}"></script> 
    <!-- cep -->
    <script src="{{asset('js/mask.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- Parsley JS -->
    <!-- <script src="{{ asset('parsleyjs/dist/parsley.min.js') }}"></script> -->
    <!-- FastClick -->
    <script src="{{asset('fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('nprogress/nprogress.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('iCheck/icheck.min.js')}}"></script>
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

    <!-- Switchery -->
    <script src="{{asset('/switchery/dist/switchery.min.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>      
    
    
    <!-- Carrinho de compras -->
    <script src="{{asset('js/shoppingCart.js')}}"></script>
   
    <!-- Ajax SetUp -->
    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }
    });
    </script>
    
    @yield('scripts')
    <script>
  // --------------------------- Jquery-functions  -------------------------------------------//
    $(document).on('click','#tipo', function(){
          var id = $("#tipo_pedido_id").val();
          var mesa = jQuery('#mesa_id');
          
          //se não for local seta a mesa 0(viagem e delivery)
          if(id != 1){
            $("#mesa_id").prop("disabled", true);
            $("#mesa_id").append('<option value="'+1+'" selected></option>');
          //
          }else{
            $("#mesa_id option[value="+1+"]").remove();
            mesa.removeAttr("disabled");
          }
    });
    
    $(document).on('click','#cliente', function(){
          var id = $("#cliente_id").val();
          console.log(id);
          $.ajax({
            type: "GET",
            url: "/cliente/show",
            dataType: "json",
            data: {id},
            success: function(cliente){
              console.log(cliente.nome);
              $("#obsevacaoPedido").val(cliente.observacao);
            },
            error: function(data){

              var errors = $.parseJSON(data.responseText);

              $.each(errors, function (key, value) {
                output="";
                if($.isPlainObject(value)) {
                      $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                        output+=value+"<br/>";
                      });

                      // $('#response').show().html(output);
                }
              });
            }
          });
         
    });
    
   //filtro bebida
    $('.filtro').on('click', '.bebidas',function(event){
      event.preventDefault();
      var tipo = Number ($(this).attr("data-filtro"));
     
      $.ajax({
        tyep: 'GET',
        url: '/produtos',
        data: {
          filtro  : tipo
        },
      
        success: function(produtos){
          var output;
          for(var i in produtos ){
           
            output += ' <tr>\
                            <td name="prod_nome" >'+produtos[i]["nome"]+'</td>\
                            <td name="prod_descr" >'+produtos[i]["descricao"]+'</td>\
                            <td name="prod_valor" >'+produtos[i]["valor"]+'</td>\
                            <td><button data-id="'+produtos[i]["id"]+'" data-nome="'+produtos[i]["nome"]+'"  data-valor="'+produtos[i]["valor"]+'"   class="add-to-cart btn btn-primary btn-xs"> Adicionar </button></td>\
                        </tr>';
            
          }
          $("#produtos").html(output);
        },
        erro: function(erro){
          alert(erro);
        }   
      });
    });
    //filtro refeicao
    $('.filtro').on('click', '.refeicoes',function(event){
      event.preventDefault();
      var tipo = Number ($(this).attr("data-filtro"));
     
      $.ajax({
        tyep: 'GET',
        url: '/produtos',
        data: {
          filtro  : tipo
        },
      
        success: function(produtos){
          var output;
          for(var i in produtos ){
           
            output += ' <tr>\
                            <td name="prod_nome" >'+produtos[i]["nome"]+'</td>\
                            <td name="prod_descr" >'+produtos[i]["descricao"]+'</td>\
                            <td name="prod_valor" >'+produtos[i]["valor"]+'</td>\
                            <td><button data-id="'+produtos[i]["id"]+'" data-nome="'+produtos[i]["nome"]+'"  data-valor="'+produtos[i]["valor"]+'"   class="add-to-cart btn btn-primary btn-xs"> Adicionar </button></td>\
                        </tr>';
            
          }
          $("#produtos").html(output);
        },
        erro: function(erro){
          alert(erro);
        }   
      });
    });
    
    //addCliente
    $("#add").click( function() {  
      $.ajax({
          type: 'POST',
          url: '/cliente/store',
          data: {
              nome :  $('input[name=nome]').val() ,
              data_nascimento:  $('input[name=data_nascimento]').val(),
              telefone_1:  $('input[name=telefone_1]').val(),
              telefone_2:  $('input[name=telefone_2]').val(),
              observacao:  $('input[name=observacao]').val(),
              cep:  $('input[name=cep]').val(),
              logradouro:  $('input[name=logradouro]').val(),
              num:  $('input[name=num]').val(),
              bairro:  $('input[name=bairro]').val()
            }    
          ,
          success: function(cliente){
                  
                  $('#cliente_id').append('<option value="'+cliente.id+'" selected>'+cliente.nome+'</option>');
                  $("#obsevacaoPedido").val(cliente.observacao);
                  $('#create').modal('hide');                   
          },
          error: function(data){              
              
              $('#response').addClass("alert alert-danger");

              var errors = $.parseJSON(data.responseText);

              $.each(errors, function (key, value) {
              // $('#' + key).parent().addClass('error');
                output="";
                if($.isPlainObject(value)) {
                      $.each(value, function (key, value) {                       
                        console.log(key+ " " +value);
                        output+=value+"<br/>";
                      });

                      $('#response').show().html(output);
                }
              });
          }
      });                     
    });
    //add item ao cart
    $("#produtos").on('click','.add-to-cart', function(event){
        event.preventDefault(); // prever outros clicks
        var nome = $(this).attr("data-nome");
        var valor = Number ($(this).attr("data-valor")); // Number String to Number
        var id = Number ($(this).attr("data-id"));        
        shoppingCart.addProduto(id, nome, valor, 1);
        displayCart();
    });
    //limpa o cart
    $("#clear-cart").click(function(event){
        shoppingCart.clearCart();
        displayCart();
    });
    //lista os itens do cart
    function displayCart(){        
       var cartArray = shoppingCart.listCart();
       var output = "";
        for(var i in cartArray){ 
          //alert(cartArray[i].qtd);                               
          output += '<tr>\
            <td>'+cartArray[i].nome+'</td>\
            <td><button class="subtract-item glyphicon glyphicon-minus btn btn-warning btn-xs" data-nome="'+cartArray[i].nome+'"></button>\
            <span>'+cartArray[i].qtd+'</span>\
            <button class="plus-item glyphicon glyphicon-plus btn btn-success btn-xs" data-nome="'+cartArray[i].nome+'"></button></td>\
            <td><button class="delete-item glyphicon glyphicon-remove  btn btn-danger btn-xs" data-nome="'+cartArray[i].nome+'"></button></td>\
            <td>'+cartArray[i].total+'</td>\
            </tr>';
        }
        $("#show-cart").html(output);
        $("#count-cart").html( shoppingCart.countCart() );
        $("#total-cart").html( shoppingCart.totalCost() );
    }
    //deleta um elemento especifico
    $("#show-cart").on("click", ".delete-item", function(event){
        var name = $(this).attr("data-nome");
        shoppingCart.removeProdutoAll(name);
        displayCart();
    });
    //subtrai em uma unidade o elemento selecionado  
    $("#show-cart").on("click", ".subtract-item", function(event){
        var nome = $(this).attr("data-nome");
        shoppingCart.removeProduto(nome);
        displayCart();
    });
    //adiciona em uma unidade o elemento selecionado
    $("#show-cart").on("click", ".plus-item", function(event){
        var nome = $(this).attr("data-nome");
        var id = Number($(this).attr("data-id"));
        shoppingCart.addProduto(id,nome,0,1,null);
        displayCart();
    });
    //finaliza o pedido
    $("#finish-cart").click(function(event){
        // cópia do cart
        var cartArray = shoppingCart.listCart();
        
        var cart = JSON.stringify(cartArray);

        
        
        var valorTotal = shoppingCart.totalCost();        
        if(jQuery.isEmptyObject(cartArray)){
          alert("Selecione algum produto!")
        }else{
            $.ajax({
                type: "POST",
                url: "/pedido/store",
                data: { 
                  produtos : cart,
                  valor_total : valorTotal,
                  mesa_id : $('#mesa_id ').val(),
                  tipo_pedido_id : $('#tipo_pedido_id').val(),
                  cliente_id : $('#cliente_id').val(),
                  observacao: $('#obsevacaoPedido').val()
                  },
                dataType: "json",
                
                success: function(data){
                    var gg= JSON.stringify(data);
                    var loc = window.location;
                    window.location = null;
                  // window.location = "welcome";
                    window.location ="/";
                },
                error: function(data) { // What to do if we fail
                  var erro= JSON.stringify(data);
                    alert("Errou"+erro);
                }       
            });
        } 
    });



// END--------------------------- Jquery-functions  -------------------------------------------END //
    </script>

  </body>
  
</html>