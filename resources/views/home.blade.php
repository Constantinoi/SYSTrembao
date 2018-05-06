@extends('layouts.base')

@section('conteudo')
@can('Manter Pedidos')
        
        <div class="clearfix"></div>
        <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Pedidos <small>Vizualizar/Editar o Pedido</small></h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                   
                      <a class="btn btn-success btn-xs  "  href="{{ route('pedido.create') }}"><i class ="fa fa-plus"></i>Novo </a>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    @if(isset($pedidos))
                   
                    <div class="accordion"  id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($pedidos as $i => $pedido)
                    <div id="remove{{$pedido->id}}">
                      <div  class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#pedido{{$pedido->id}}" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Pedido:  {{$pedido->numero_pedido }}   |<label><span> Tipo: {{ $pedido->tipoPedido->nome}} |</span></label>   Mesa: <span >{{ $pedido->mesa->numero}} |</span>   <label><span> Cliente: {{ $pedido->cliente->nome}} </span></label>   </h4>
                         
                        </a>
                        <div id="pedido{{$pedido->id}}" data-idd="{{$pedido->id}}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>Quantd</th>
                                  <th>Produto </th>                                 
                                  <th>Valor</th>                                 
                                </tr>
                              </thead>
                              <tbody id="show-cart">
                             
                                @foreach($pedido->produtos as $detalhe) 
                                  <tr>
                                    <td>{{$detalhe->pivot->quantidade}}</td>
                                    <td>{{$detalhe->nome}}</td>
                                    <td>{{$detalhe->valor * $detalhe->pivot->quantidade }} </td>
                                  
                                  </tr>
                                @endforeach
                              </tbody>
                              
                            </table>
                              <tfooter>
                                 <label> Sub Total:      <span >{{ $pedido->valor_total}} </span></label>
                                 
                                 <div class="col-md-offset-6">
                                    <button data-pedido="{{ $pedido->id }}"  class="finaliza-pedido glyphicon glyphicon-ok  btn btn-warning btn-xs" >Finalizar  </button>
                                    <a href="{{ route('pedido.edit', $pedido) }}" class="glyphicon glyphicon-edit  btn btn-primary btn-xs"> Editar</a>
                                    <button data-id="{{ $pedido->id }}" class="delete-item  glyphicon glyphicon-remove  btn btn-danger btn-xs"  >Cancelar</button>
                                 </div>
                              </tfooter>
                          </div>
                        </div>

                      </div>
                     
                    </div>
                   @endforeach
                    </div>
                    <!-- end of accordion  -->
                  @endif

                  </div>
                </div>
              </div>


              <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Mesas <small>Iniciar/acessar um Pedido</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <!-- start accordion -->
                    <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">                   
                               
                    </div>
                   <!-- end of accordion -->
                  </div>
                </div>
              </div>
            <div class="clearfix"></div>
@endcan 
@section('scripts')
<script>
 $(document).ready(function(){
   displayMesa();
//    $.ajax({
//             type: "get",
//             url: "pedido/index",            
            
            
//             success: function(pedidos){
//                //chamar função para listar
//                alert(pedidos);
//                var pedidosJson = JSON.parse(pedidos); 
//                console.log(pedidosJson);
//                var output = "";
//                alert(pedidosJson);

//                for(var i in pedidosJson){ 
//                 // converte json string to JS object
                
                
//                 output += '<tr>\
//                   <td>'+pedidosJson[i].nome+'</td>\
//                   <td><button class="subtract-item glyphicon glyphicon-minus btn btn-warning btn-xs" data-nome="'+pedidosJson[i].nome+'"></button>\
//                   <span>'+pedidosJson[i].qtd+'</span>\
//                   <button class="plus-item glyphicon glyphicon-plus btn btn-success btn-xs" data-nome="'+pedidosJson[i].nome+'"></button></td>\
//                   <td><button class="delete-item glyphicon glyphicon-remove  btn btn-danger btn-xs" data-nome="'+pedidosJson[i].nome+'"></button></td>\
//                   <td>'+pedidosJson[i].total+'</td>\
//                   </tr>';
//                }
//                $("#show-cart").html(output);
//             },
//             error: function(data) { // What to do if we fail
//               var data= JSON.stringify(data);
//                 alert("algo errado   : "+data);
//             }       
//         });
 });

 function displayMesa(){
      // alert("entrei no displayMesa");
            
      
       $.ajax({
         type: "get",
         url: "mesa",
         dataType: "json",

         success: function(mesas){ 
          // mesas = JSON.stringify(mesas);
          // alert(mesas);
          // mesas.sort(function(a, b) { 
          //   return a.id > b.id ;
          // });
          var output = ""; 
          for(var i in mesas){ 
                                   
            output += '<div class="panel panel-success">\
            <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#mesa'+mesas[i]["id"]+'" aria-expanded="false" aria-controls="collapseTwo">\
            <h4 class="panel-title">Mesa '+mesas[i]["numero"]+'</h4>\
            </a>\
            <div id="mesa'+mesas[i]["id"]+'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">\
            <div class="panel-body">\
            <p><strong>Mesa Livre</strong>\
            </p>\
            <a  href="pedido/create/mesa/'+mesas[i]["id"]+'" class="btn btn-success btn-xs" >Iniciar Pedido </a>\
            </div>\
            </div>\
            </div>';
            
          }
          //seta os painés no acordião de mesas
          $("#accordion1").html(output);
         },

         erro: function(mesas){
           alert("Erro = "+mesas);
         } 
         
      });
             
    }
 

  $(".finaliza-pedido").click(function(event){
    if (!(confirm("Tem certeza que deseja FINALIZAR esse pedido?"))) {
          return;
    }else {
          
      var i =  $(this).attr("data-pedido");

      $.ajax({
        type: "post",
        url: "pedido/destroy",
        data:{
              pedido_id :  $(this).attr("data-pedido"),
              _method : "delete"
        },
        dataType: "json",
        
        success: function(response){
          document.getElementById('remove'+i).remove();
          displayMesa();
        },
        error: function(response){
          console.log(response.responseText);
        }
      });  
    }
  });

  $(".delete-item").click(function(event){  
    if (!(confirm("Tem certeza que deseja apagar esse pedido?"))) {
          return;
    }else {       
      
      var i =  $(this).attr("data-id");
      
      $.ajax({
          type: "post",
          url: "pedido/cancelaPedido",
          data: {
                  pedido_id :  $(this).attr("data-id"),
                  _method : "delete"
                },
          dataType: "json",
          success: function (response)
            {
                document.getElementById('remove'+i).remove();
                displayMesa();
            },
            error: function(response) {
            console.log(response.responseText); // this line will save you tons of hours while debugging
            // do something here because of error
          }
        
        });
    }
  });

   $("#accordion1").on("click", ".cria-pedido", function(event){
      alert("entrei no cria pedido");

      $.ajax({
        type: "get",
        url: "pedido/create/mesa",
        data: {
              mesa : $(this).attr("data-cria")
        },
        dataType:"json",

        success:function(data){
          alert("ok");
        },
        erro:function(data){
          alert("erro = "+data);
        }
      });

    });


</script>          
@endsection
@endsection