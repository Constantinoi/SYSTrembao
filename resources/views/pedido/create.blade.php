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
                              
                              @foreach($mesas as $valor)
                                @if(isset($mesa) && $mesa->numero === $valor->numero )
                                  <option value="{{$valor->id}}" selected>{{$valor->numero}}</option>
                                @else
                                  <option value="{{$valor->id}}" >{{$valor->numero}}</option>
                                @endif    
                              @endforeach                           
                            
                        </select>
                        </label>
                      </div>
                      <div class="form-group">
                        <label class="" for="tipo_pedido_id">Tipo:
                          <select id="tipo_pedido_id" name="tipo_pedido_id">
                          @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}">{{ $tipo->nome }}</option>                            
                          @endforeach 
                          </select>
                        </label>    
                      </div>
                      <div class="form-group">
                          <label   for="cliente_id">Cliente:
                            <select id="cliente_id" name="cliente_id">
                              @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{ $cliente->nome }}</option>                            
                              @endforeach 
                            </select>                         
                          </label>   
                      </div>
                        <a class="btn btn-success fa fa-plus" data-toggle="modal" data-target="#create"> Cadastrar Cliente</a>                        
                    </form>                 
                  </div>
                </div>
              </div>
            

              <div class="col-md-10  col-sm-10 col-xs-10">
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


              <div class="col-md-10 col-sm-10 col-xs-10">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pedido <small>Detalhes do Pedido</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                            <!-- Ajax popula aqui -->
                        </tbody>
                    </table>
                    <tfoot >
                        <label> Total de itens: <span id="count-cart"></span></label>
                        <br>
                        <label> Sub Total:      <span id="total-cart"></span></label>
                        
                        <div class="col-md-offset-10">
                            <button id="finish-cart" class="btn btn-success glyphicon glyphicon-ok"> Finalizar</button>    
                        </div>               
                    </tfoot>
                     <!--  </form>  --> 
                  </div>
                </div>
              </div>
 



                {{-- Modal Form Create  --}}
    <!-- modal cliente-->
    <div class="modal fade bs-example-modal-lg" id="create" tabindex="-1" role="dialog" aria-labelledby="clienteModalLabel">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="false">&times;</span></button>
              <h4 class="modal-title" id="orientadorModalLabel">Cadastre um Cliente</h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" role="form">              
                
                @include('cliente._dados')

                <div class="ln_solid"></div>      
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
              <a id="add"  class="btn btn-primary">Cadastrar</a>
              <!-- menssagem de erro -->
              <div class="success margin-top-20">
                  @include('errors._erro')
              </div>
            </div>
          </div>
        </div>
      </div>
  <!-- END modal cliente-->
   

@endsection

@section('scripts')
<script>

// --------------------------- Jquery-functions  -------------------------------------------//
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

                    $('#create').modal('hide');  
                   
            },
            erro: function(erro){              
                console.log(erro.response);
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
    
    $("#finish-cart").click(function(event){
        // cópia do cart
        var cartArray = shoppingCart.listCart();
        
        var cart = JSON.stringify(cartArray);
        
        var valorTotal = shoppingCart.totalCost();

        cliente_id = $('#cliente_id').val()
        

        $.ajax({
            type: "POST",
            url: "/pedido/store",
            data: { 
              produtos : cart,
              valor_total : valorTotal,
              mesa_id : $('#mesa_id ').val(),
              tipo_pedido_id : $('#tipo_pedido_id').val(),
              cliente_id : $('#cliente_id').val()
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