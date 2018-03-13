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
                          <th>Valor Unitário</th>
                          <td>Quantidade</td>
                          <th>Ações</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($produtos as $produto)
                        <form class="form-horizontal" method="post"  action="{{route('pedidos.produto.store',$pedido->id)}}" >
                        {{ csrf_field() }}
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->valor}}</td>
                            <td>  <input name="quantidade" type="number" min="1" max="10" required> </input> </td>
                            <td>   <button name="produto_id" value="{{$produto->id}}" class="btn btn-primary fa fa-plus-square-o" > Adicionar </button>  </td>

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

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Quantidade</th>
                          <th>Produto</th>
                          <th>Descrição</th>
                          <th>Valor</th>
                          <th>Ações</th>
                        </tr>
                    </thead>
                <tbody>   
                  @foreach($detalhes as $detalhe)
                  <tr>
                      <td>{{$detalhe->quantidade}}</td>
                      <td>{{$detalhe->produtos->nome}}</td>
                      <td>{{$detalhe->produtos->descricao}}</td>  
                      <td>{{$detalhe->valor}} </td>
                      <form method="post" action="{{route('pedidos.produto.destroy',[$pedido->id,$detalhe->produtos->id])}}">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                        <td><button  class="btn btn-danger fa fa-minus-square-o"> Remover</button></td>
                      </form>
                    </tr>
                  @endforeach     
               </tbody>
                    </table>

                  </div>
                </div>
              </div>

@endsection