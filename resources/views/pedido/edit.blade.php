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
              <div class="col-md-10  col-sm-10 col-xs-12">
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

                       @include('pedido._tipo')

                      <div class="form-group">
                      <label class="" for="mesa_id">Mesa: 
                        <select class="" name="mesa_id" id="mesa_id">
                              
                              @foreach($mesas as $mesa)
   
                              <option value="{{$mesa->id}}" >{{$mesa->nome}}</option>
                                  
                              @endforeach                           
                              <option value="{{$pedido->mesa->id}}" selected>{{$pedido->mesa->nome}}</option>
                        </select>
                        </label>
                         
                      </div>
                      <div class="form-group">
                          <label id="cliente" for="cliente_id">Cliente:
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

              @include('pedido._produtos')


              <div class="col-md-10 col-sm-10 col-xs-12">
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
                           
                          
                        </tbody>
                    </table>
                    <tfoot >
                        <label> Observação: <input id="obsevacaoPedido"  name="observacao" type="text" value="{{ $pedido->observacao }}" ></label>
                        <br>
                        <label> Total de itens: <span id="count-cart"></span></label>
                        <br>
                        <label> Sub Total:      <span id="total-cart"></span></label>
                        
                                             
                        <div class="col-md-offset-7">
                          <a class="btn btn-primary  glyphicon glyphicon-arrow-left" href="{{ route('home') }}" >   Voltar </a>
                              <button  data-id="{{ $pedido->id }}" class="delete-item btn btn-danger glyphicon glyphicon-remove" >Cancelar </button>
                              <button id="edit-cart" data-id="{{ $pedido->id }}" class="btn btn-success glyphicon glyphicon-ok"> Finalizar</button>    
                        </div>     
                                 
                    </tfoot>
                     <!--  </form>  --> 
                  </div>
                </div>
              </div>

   

@section('scripts')
<script>

   

    $(document).ready(function(){
          var id = $("#tipo_pedido_id").val();
          var mesa = jQuery('#mesa_id');
          //se não for local seta a mesa 0
          if(id != 1){
            $("#mesa_id").prop("disabled", true);
            $("#mesa_id").append('<option value="'+1+'" selected></option>');
          }

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

    $("#edit-cart").click(function(event){
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
              _method : "put",
              observacao: $('#obsevacaoPedido').val()
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