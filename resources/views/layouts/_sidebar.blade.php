            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Painel de ações</h3>
                
                <ul class="nav side-menu">
                @can('Administrador')
                 <li><a><i class="fa fa-dashboard"></i> Administrativo <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route ('user.index')}}">Usuários</a></li>
                      <li><a href="{{route ('papeis.index')}}">Papéis</a></li>
                      
                    </ul>
                  </li>
                @endcan
                @can('Manter Pedidos')
                  <li><a><i class="fa fa-list"></i> Pedidos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('pedido.create') }}">Iniciar Pedido</a></li>
                      <li><a href="#">Histórico</a></li>
                      
                    </ul>
                  </li>
                  @endcan
                  @can('Manter Produtos')
                  <li><a><i class="fa fa-cutlery"></i> Produtos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route ('produtos.create')}}">Cadastrar Produto</a></li>
                      <li><a href="{{route ('produtos.index')}}">Lista de Produtos</a></li>
                      
                    </ul>
                  </li>
                  @endcan
                  @can('Manter Clientes')
                  <li><a><i class="fa fa-users"></i> Clientes <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('cliente.create')}}">Cadastrar Cliente</a></li>
                      <li><a href="{{route('cliente.index')}}">Lista de Clientes</a></li>             
                    </ul>
                  </li>
                  @endcan
                  
                  <li><a><i class="fa fa-bar-chart"></i> Faturamento <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Relatório de faturamento</a></li>                      
                    </ul>
                  </li>
                  
                </ul>
              </div>
            </div>