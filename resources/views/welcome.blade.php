@extends('layouts.base')

@section('conteudo')

        <div class="page-title">
            <div class="title_left">
                <h3>Bem Vindo, Fulano</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-8 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Pedidos <small>Vizualizar/Editar o Pedido</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    @if(isset($pedidos))
                    @foreach($pedidos as $i => $pedido)
                    <div class="accordion"  id="accordion{{$pedido->id}}" role="tablist" aria-multiselectable="true">
                      
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Pedido  {{$pedido->id }}</h4>
                        </a>
                        <div id="collapseOne" data-idd="{{$pedido->id}}" class="esconde panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
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
                                 <div class="col-md-offset-8">
                                 <a href="{{ route('pedido.edit', $pedido) }}"  class="glyphicon glyphicon-edit  btn btn-primary btn-xs" > <span >Editar</span></a>
                                 <button data-id="{{ $pedido->id }}" class="delete-item  glyphicon glyphicon-remove  btn btn-danger btn-xs"  ><span >Cancelar</span></button>
                                 </div>
                              </tfooter>
                          </div>
                        </div>

                      </div>
                     
                    </div>
                   @endforeach
                    <!-- end of accordion  -->
                  @endif

                  </div>
                </div>
              </div>


              <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Mesas <small>Iniciar um Novo Pedido</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Mesa #1</h4>
                        </a>
                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Username</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Mark</td>
                                  <td>Otto</td>
                                  <td>@mdo</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Jacob</td>
                                  <td>Thornton</td>
                                  <td>@fat</td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>Larry</td>
                                  <td>the Bird</td>
                                  <td>@twitter</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Mesa #2</h4>
                        </a>
                        <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <p><strong>Collapsible Item 2 data</strong>
                            </p>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Mesa #3</h4>
                        </a>
                        <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <p><strong>Collapsible Item 3 data</strong>
                            </p>
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end of accordion -->


                  </div>
                </div>
              </div>

            </div>
            <div class="clearfix"></div>
   
@section('scripts')
<script>
// $(document).ready(function(){

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
// });

  // $('.esconde').click(function(event){
  //   var i =  $(this).attr("data-idd");
  //   alert(i);
  //   document.getElementById('collapseOne'+i).collapse();
  // });


// function displayPedidos(pedidos){
//      //pega array

//      for(var i in pedidos){
//        output += '<tr>\
//                   <td>'+pedidos[i].id+'</td>\
//                   <td>'+pedidos[i].id+'</td>\
//                   <td>'+pedidos[i].id+'</td>\
//                   <td>'+pedidos[i].id+'</td>\
//                 </tr>';

//      }
// }


$(".delete-item").click(function(event){
  if (!(confirm("Tem certeza que deseja apagar esse pedido?"))) {
        return;
  }else {       
    
    var i =  $(this).attr("data-id");
    
    $.ajax({
        type: "post",
        url: "pedido/destroy/all",
        data: {
                pedido_id :  $(this).attr("data-id"),
                _method : "delete"
              },
        dataType: "json",
        success: function (response)
          {
              //alert(response); // see the reponse sent
              //location.reload();
              
            // $('.accordion'+i ).remove(); 
              document.getElementById('accordion'+i).remove();
          },
          error: function(xhr) {
          console.log(xhr.responseText); // this line will save you tons of hours while debugging
          // do something here because of error
        }
      
      });
  }
});

// $("#edit-item").click(function(event){
//   var i =  $(this).attr("data-id");
//   alert(i);
//   $.ajax({
//     type : "GET",
//     url: "pedido/edit",
//     data: {
//           pedido_id :  $(this).attr("data-id")
//           }
//   });
// });
</script>          
@endsection
@endsection