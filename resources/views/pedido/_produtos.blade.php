<div class="col-md-10  col-sm-12 col-xs-12">
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
                    <div class="filtro btn-group  btn-group-sm  col-md-offset-5">
                          <button class="bebidas btn btn-default" data-filtro="{{$tipoBebida}}" type="button">Bebidas</button>
                          <button class="refeicoes btn btn-default" data-filtro="{{$tipoRefeicao}}" type="button">Refeições</button>
                    </div>

                    <table id="datatable-responsive" class="table table-hover">
                    
                      <thead>
                        <tr>                          
                          <th>Nome</th>
                          <th>Descrição</th>
                          <th>Valor Unit</th>                   
                          <th>Ações</th>
                        </tr>
                      </thead>
                      <tbody id="produtos">
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
