            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Painel de ações</h3>
                
                <ul class="nav side-menu">
                @can('Administrador')
                 <li><a><i class="fa fa-dashboard"></i> Administrativo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route ('user.index')}}">Funcionários</a></li>
                      <!-- <li><a href="{{route ('papeis.index')}}">Papéis</a></li> -->
                    </ul>
                  </li>
                @endcan
                @can('Manter Pedidos')
                  <li><a><i class="fa fa-list"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('pedido.create') }}">NovoPedido</a></li>               
                    </ul>
                  </li>
                @endcan
               
                  @can('Manter Produtos')
                  <li><a><i class="fa fa-cutlery"></i> Produtos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route ('produtos.create')}}">Cadastrar Produto</a></li>
                      <li><a href="{{route ('produtos.index')}}">Cardápio</a></li>
                      
                    </ul>
                  </li>
                  @endcan
                  @can('Manter Clientes')
                  <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('cliente.create')}}">Cadastrar Cliente</a></li>  
                      <li><a href="{{route('cliente.index')}}">Clientes</a></li>  
                    </ul>
                  </li>
                  @endcan
                  
                  @can('Cozinha')
                  <li><a><i class="fa fa-list"></i> Cozinha <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('pedido.index') }}">Pedidos</a></li>
                                 
                    </ul>
                  </li>
                  @endcan 

                  <!-- <li><a><i class="fa fa-bar-chart"></i> Faturamento <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Relatório de faturamento</a></li>                      
                    </ul>
                  </li> -->
              
                  
                </ul>
              </div>
            </div>