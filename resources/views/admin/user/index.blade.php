@extends('layouts.base')

@section('conteudo')


            <div class="col-md-10 col-sm-10 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Usuários <small>Lista com usuários do sistema</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table">
                      <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Papel</th>
                            <th>Ações</th> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)                        
                        <tr>
                            <td>{{$user->name}}</td>                              
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{route('user.papel',$user->id)}}"> Papél</a>
                            </td>                                                  
                            <td>
                                
                                <!-- <a class="btn btn-info btn-xs " href="{{route('user.edit', $user->id)}}"> Editar</a> -->
                                <a class="btn btn-danger btn-xs " href="{{route('user.remove', $user->id)}}"> Remover</a>                                            
                            </td>
                        </tr>
                        @endforeach  
                      </tbody>
                    </table>
                    <div class="ln_solid"></div>

                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >    
                                <a href="{{ route('admin.index') }}" class="btn btn-primary ">Voltar</a>      
                                <a href="{{route('user.create')}}" class="btn btn-success ">Novo Usuário</a>             
                            </div>
                        </div>

                  </div>
                </div>
            </div>
            <div class="clearfix"></div>


@endsection