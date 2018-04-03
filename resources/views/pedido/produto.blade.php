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
                       <!-- <form class="form-horizontal" method="post"  action="{{route('pedido.store')}}" >
                        {{ csrf_field() }}
                        <input type="hidden" name="pedido_id" value="{{ isset($pedido) ? $pedido->id : null }}" ></input>-->
                        <tr>
                            <td name="prod_nome" >{{$produto->nome}}</td>
                            <td name="prod_descr" >{{$produto->descricao}}</td>
                            <td name="prod_valor" >{{$produto->valor}}</td>
                            <td><button data-nome="{{$produto->nome}}"  data-valor="{{$produto->valor}}"  name="produto_id" value="{{$produto->id}}" class="add-to-cart btn btn-primary"> Adicionar </button></td>

                        </tr>
                        </form>
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
                  <button class="btn btn-danger" id="clear-cart">Limpar Pedido</button>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Produto </th>
                          <th colspan="2"> Quantd</th>
                          <th>Valor</th> 
                        </tr>
                      </thead>
                      <tbody id="show-cart">
                      <!-- -->
                          <tr>
                          
                            
                          
                          </tr>
                            
                     </tbody>
                    </table>
                    <tfoot >
                        <div> Total de itens: <span id="count-cart"></span></div>
                        <div> Sub Total:      <span id="total-cart"></span></div>               
                    </tfood>

                  </div>
                </div>
              </div>

@endsection

@section('scripts')

   
@endsection