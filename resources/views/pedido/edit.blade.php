@extends('layouts.base')

@section('conteudo')

<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pedido <small>Edite o pedido!</small></h3>
              </div>

          </div>
          

            <div class="clearfix"></div>

    <div class="row">
              <div class="col-md-10  col-sm-10 col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Informações <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-inline">
                      <div class="form-group">
                        <label class="" for="mesa_id">Mesa: 
                        <select class="" name="mesa_id" id="mesa_id">
                              
                              @foreach($mesas as $mesa)
                                @if($pedido->mesa->numero == $mesa->numero )
                                  <option value="{{$mesa->id}}" selected>{{$mesa->numero}}</option>
                                @else
                                  <option value="{{$mesa->id}}" >{{$mesa->numero}}</option>
                                @endif    
                              @endforeach                           
                            
                        </select>
                        </label>
                      </div>
                      <div class="form-group">
                        <label class="" for="tipo_pedido_id">Tipo:
                          <select id="tipo_pedido_id" name="tipo_pedido_id">
                          @foreach($tipos as $tipo)
                            @if($pedido->tipoPedido->id  == $tipo->id)
                              <option value="{{$tipo->id}}" selected>{{ $tipo->nome }}</option>
                            @else
                              <option value="{{$tipo->id}}" >{{ $tipo->nome }}</option> 
                            @endif                            
                          @endforeach 
                          </select>
                        </label>    
                      </div>
                      <div class="form-group">
                          <label   for="cliente_id">Cliente:
                            <select id="cliente_id" name="cliente_id">
                              @foreach($clientes as $cliente)
                              @if($pedido->cliente->id == $cliente->id)
                                <option value="{{$cliente->id}}" selected >{{ $cliente->nome }}</option>
                              @else
                                <option value="{{$cliente->id}}">{{ $cliente->nome }}</option>
                              @endif                                                            
                              @endforeach 
                            </select>                         
                          </label>   
                      </div>
                                        
                    </form>                 
                  </div>
                </div>
              </div>

              <div class="col-md-10  col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produtos <small>lista de produtos</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table id="datatable-responsive" class="table table-hover">
                      <thead  >
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
                    <h2>Itens no Pedido <small>Edite aqui os itens no Pedido Atual</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <button class="btn btn-danger btn-xs " id="clear-cart">Limpar Pedido</button>
                    <table  class="table table-bordered">
                      <thead id="pedido_id" data-id="{{ $pedido->id }}" >
                        <tr>
                          <th>Produto </th>
                          <th colspan="2"> Quantd </th>
                          <th> Valor </th>
                          
                        </tr>
                      </thead>
                      <!--   <form  >  -->
                        {{csrf_field()}} 
                       
                        <tbody id ="show-cart"> 
                            <!-- @foreach($pedido->produtos as $detalhe)
                                <tr>                                  
                                  <td>{{$detalhe->nome}}</td>
                                  <td><button class="subtract-item glyphicon glyphicon-minus btn btn-warning btn-xs" data-nome="{{$detalhe->nome}}'"></button>
                                  <span>{{$detalhe->pivot->quantidade}}</span>
                                  <button class="plus-item glyphicon glyphicon-plus btn btn-success btn-xs" data-nome="{{$detalhe->nome}}"></button></td>
                                  <td><button class="delete-item glyphicon glyphicon-remove  btn btn-danger btn-xs" data-nome="{{$detalhe->nome}}"></button></td>
                                  <td>{{$detalhe->valor * $detalhe->pivot->quantidade }} </td>                                 
                                </tr>
                            @endforeach  -->
                          
                        </tbody>
                    </table>
                    <tfoot >
                        <label> Total de itens: <span id="count-cart"></span></label>
                        <br>
                        <label> Sub Total:      <span id="total-cart"></span></label>
                        
                                             
                        <div class="col-md-offset-7">
                          <a class="btn btn-primary  glyphicon glyphicon-arrow-left" href="{{ url()->previous() }}" >   Voltar </a>
                              <button  data-id="{{ $pedido->id }}" class="delete-item btn btn-danger glyphicon glyphicon-remove" >Cancelar </button>
                              <button id="finish-cart" data-id="{{ $pedido->id }}" class="btn btn-success glyphicon glyphicon-ok"> Finalizar</button>    
                        </div>     
                                 
                    </tfoot>
                     <!--  </form>  --> 
                  </div>
                </div>
              </div>

   

@section('scripts')
<script>

    $(document).ready(function(){

      $.ajax({
                type: "get",
                url: "/pedido/show", 
                data:  {
                          id: $("#pedido_id").attr("data-id")
                        },
                dataType: "text",

                success: function(produtosString){
                  // alert("ok"+produtosString);
                    var produtos = JSON.parse(produtosString);
                  //for para add cada produto do pedido no shoppingcart
                  for(i in produtos){
                  //  alert(produtos[i]["id"], produtos[i]["nome"], produtos[i]["valor"], produtos[i]["pivot"]["quantidade"]);
                    shoppingCart.addProduto(produtos[i]["id"], produtos[i]["nome"],  produtos[i]["valor"],produtos[i]["pivot"]["quantidade"]);

                  }
                  displayCart();
                },
                erro: function(produtos){
                  alert("ruim"+produtos);
                }  
        });
              
    });

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

    $(".delete-item").click(function(event){
      if (!(confirm("Tem certeza que deseja apagar esse pedido?"))) {
            return;
      }else {       
        
        var i =  $(this).attr("data-id");
        
        $.ajax({
            type: "post",
            url: "/pedido/cancelaPedido",
            data: {
                    pedido_id :  $(this).attr("data-id"),
                    _method : "delete"
                  },
            dataType: "json",
            success: function (response)
              {
                var loc = window.location;
                window.location = null;               
                window.location ="/";
              },
              error: function(xhr) {
                console.log(xhr.responseText); 
            }
          
          });
      }
    });

    $("#finish-cart").click(function(event){
        // cópia do cart
        var cartArray = shoppingCart.listCart();
        // JSON array no formato String
        var cart = JSON.stringify(cartArray);
       // alert(cart);
        var valorTotal = shoppingCart.totalCost();
        
       
        $.ajax({
            type: "POST",
            url: "/pedido/update",
            data: { 
              produtos : cart,
              valor_total : valorTotal,
              pedido_id :  $(this).attr("data-id"),
              mesa_id : $('#mesa_id ').val(),
              tipo_pedido_id : $('#tipo_pedido_id').val(),
              cliente_id : $('#cliente_id').val(),
              _method : "put"
              },
            dataType: "json",
            
            success: function(data){
                var gg= JSON.stringify(data);
                var loc = window.location;
                window.location = null;
               // redirect para a home
                window.location ="/";
            },
            error: function(data) { // What to do if we fail
              var erro= JSON.stringify(data);
                alert("Errou"+erro);
            }       
        });
          
    });
    
</script>

@endsection
@endsection