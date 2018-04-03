@extends('layouts.base')

@section('conteudo')

<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pedido <small>Monte o pedido!</small></h3>
              </div>

          </div>
          

            <div class="clearfix"></div>

    <div class="row">
              <div class="col-md-10  col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produtos <small>lista de produtos</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Bebida</a>
                          </li>
                          <li><a href="#">Refeição</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-hover">
                      <thead>
                        <tr>                          
                          <th>Nome</th>
                          <th>Descrição</th>
                          <th>Valor Unit</th>                   
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($produtos as $produto)
                     
                        <tr>
                            <td name="prod_nome" >{{$produto->nome}}</td>
                            <td name="prod_descr" >{{$produto->descricao}}</td>
                            <td name="prod_valor" >{{$produto->valor}}</td>
                            <td><button data-id="{{$produto->id}}" data-nome="{{$produto->nome}}"  data-valor="{{$produto->valor}}"   class="add-to-cart btn btn-primary btn-xs"> Adicionar </button></td>

                        </tr>
                        
                       @endforeach                        
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>


              <div class="col-md-10 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pedido <small>Detalhes do Pedido</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <button class="btn btn-danger btn-xs " id="clear-cart">Limpar Pedido</button>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Produto </th>
                          <th colspan="2"> Quantd</th>
                          <th>Valor</th> 
                        </tr>
                      </thead>
                      <!--   <form  >  -->
                        {{csrf_field()}} 
                       
                        <tbody id="show-cart">
                          
                        </tbody>
                    </table>
                    <tfoot >
                        <label> Total de itens: <span id="count-cart"></span></label>
                        <br>
                        <label> Sub Total:      <span id="total-cart"></span></label>
                        
                        <div class="col-md-offset-10">
                            <button id="finish-cart" class="btn btn-success glyphicon glyphicon-ok"> Finalizar</button>    
                        </div>               
                    </tfood>
                     <!--  </form>  --> 
                  </div>
                </div>
              </div>

@endsection

@section('scripts')
<script>

// --------------------------- Jquery-functions  -------------------------------------------//
   

    $(".add-to-cart").click(function(event){
        event.preventDefault(); // prever outros clicks
        var nome = $(this).attr("data-nome");
        var valor = Number ($(this).attr("data-valor")); // Number String to Number
        var id = Number ($(this).attr("data-id"));        
        shoppingCart.addProduto(id, nome, valor, 1);
        displayCart();
    });

    $("#clear-cart").click(function(event){
        shoppingCart.clearCart();
        displayCart();
    });

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

    
    $("#show-cart").on("click", ".delete-item", function(event){
        var name = $(this).attr("data-nome");
        shoppingCart.removeProdutoAll(name);
        displayCart();
    });

    $("#show-cart").on("click", ".subtract-item", function(event){
        var nome = $(this).attr("data-nome");
        shoppingCart.removeProduto(nome);
        displayCart();
    });

    $("#show-cart").on("click", ".plus-item", function(event){
        var nome = $(this).attr("data-nome");
        var id = Number($(this).attr("data-id"));
        shoppingCart.addProduto(id,nome,0,1,null);
        displayCart();
    });
    
    $("#finish-cart").click(function(event){
        // cópia do cart
        var cartArray = shoppingCart.listCart();
        //alert(cartArray);
        var cart = JSON.stringify(cartArray);
        alert(cart);
        var valorTotal = shoppingCart.totalCost();
       
        $.ajax({
            type: "POST",
            url: "/pedido/store",
            data: { 
              produtos : cart,
              valor_total : valorTotal
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
          
    });



// END--------------------------- Jquery-functions  -------------------------------------------END //

     displayCart();
   
    // console.log("shoppingCart : ");
    // console.log(shoppingCart.cart);
  
  
</script> 

   
@endsection