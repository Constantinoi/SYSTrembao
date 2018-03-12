@extends('layouts.base')

@section('conteudo')


          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Pedido <small>Monte o seu pedido!</small></h3>
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
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>Coca-Cola</td>
                            <td>2 Litros</td>
                            <td>2,50</td>
                            <td> <button class="btn btn-primary fa fa-plus-square-o" > Adicionar </button>  </td>

                        </tr>
                        
                        
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
                      <td>2</td>
                      <td>Coca-Cola</td>
                      <td>2 litros</td>
                      <td>5,00 </td>
                      <td><button class="btn btn-danger">Remover</button></td>
                </tbody>
                    </table>

                  </div>
                </div>
              </div>

@endsection