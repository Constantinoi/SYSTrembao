@extends('layouts.base')

@section('conteudo')

    <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><i class="fa fa-align-left"></i> Pedidos <small></small></h2>
                    
                    <ul class="nav navbar-right panel_toolbox">
                   
                     
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- start accordion -->
                    @if(isset($pedidos))
                   
                    <div class="accordion"  id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($pedidos as $i => $pedido)
                    <div >
                      <div  class="panel">
                        <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#pedido{{$pedido->id}}" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Pedido:  {{$pedido->numero_pedido }}   |<label><span> Tipo: {{ $pedido->tipoPedido->nome}} |</span></label>   Mesa: <span >{{ $pedido->mesa->nome}} |</span>   <label><span> Cliente: {{ $pedido->cliente->nome}} </span></label>   </h4>
                         
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
                              <tbody >
                             
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
                                <label><span>  Observação:  {{ $pedido->observacao}} </span>  </label><br>
                                <label> <span ><h4> Sub Total: R$ {{ $pedido->valor_total}} </span> </h4> </label>
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

           
        <div class="clearfix"></div>

@endsection

@section('scripts')
<script>
setTimeout(function() {
    location.reload();
}, 60000);
</script>
@endsection