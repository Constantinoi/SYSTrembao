<div class="col-md-10 col-sm-12 col-xs-12">
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
                        <label> Observação:     <input id="obsevacaoPedido"  name="observacaoPedido" type="text"  ></label>
                        <br>
                        <label> Total de itens: <span id="count-cart"></span></label>
                        <br>
                        <label> Sub Total:      <span id="total-cart"></span></label>
                        
                        <div class="col-md-offset-9">
                            <a class="btn btn-primary  glyphicon glyphicon-arrow-left" href="{{ route('home') }}"> Voltar </a>
                            <button id="finish-cart" class="btn btn-success glyphicon glyphicon-ok"> Finalizar</button>    
                        </div>               
                    </tfoot>
                     <!--  </form>  --> 
                  </div>
                </div>
              </div>