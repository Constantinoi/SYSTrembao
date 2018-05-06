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
              <div class="col-md-10  col-sm-12 col-xs-12">
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
                            
                            <select id="cliente_id" name="cliente_id" type="button">
                              @foreach($clientes as $cliente)
                                <option value="{{$cliente->id}}">{{ $cliente->nome }}</option>                            
                              @endforeach 
                            </select> 
                                                    
                          </label>   
                      </div>
                        <a class="btn btn-default" type="button">Detalhes</a>
                        <a class="btn btn-success " data-toggle="modal" data-target="#create" > Cadastrar Cliente</a>                        
                    </form>                 
                  </div>
                </div>
              </div>
            

             @include('pedido._produtos')

             @include('pedido._detalhes')

             
 



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
              <div id="response" class="margin-top-20">
                 
              </div>
              <form class="form-horizontal" role="form" id="clienteModal" >              
                
                @include('cliente._dados')

                <div class="ln_solid"></div>      
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Voltar</button>
              <a id="add"  class="btn btn-primary">Cadastrar</a>
              <!-- menssagem de erro -->
             
            </div>
          </div>
        </div>
      </div>
  <!-- END modal cliente-->
   

@endsection

@section('scripts')
<script>

  





    //  displayCart();
   
    // console.log("shoppingCart : ");
    // console.log(shoppingCart.cart);
  
  
</script> 

   
@endsection