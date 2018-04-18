@extends('layouts.base')

@section('conteudo')
@can('Lista de usuários')
        <div class="col-md-2" >      
             <div class="x_panel" >
                <a href="{{ route('admin.index') }}" class="btn btn-primary btn-xs">Voltar</a>      
                <a href="{{route('user.create')}}" class="btn btn-success btn-xs">Novo Usuário</a>              
             </div>
        </div>
            <div class="clearfix"></div>
               
                <div class="col-md-10 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                        <h2>Usuários <small>Lista com usuários do sistema</small></h2>
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
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Papéis</th>
                                    <th>Ações</th>                          
                                </tr>
                            </thead>           
                            <tbody>            
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>                              
                                        <td>{{$user->email}}</td>
                                        
                                        <td>
                                            <a title="Papel" class="btn btn-primary btn-xs" href="{{route('user.papel',$user->id)}}">Papél</a>
                                        </td>
                                    
                                        <td>
                                            <a href="{{route('user.edit', $user->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <a href="{{route('user.remove', $user->id)}}"><i class="glyphicon glyphicon-trash"></i></a>                                            
                                        </td>                                
                                    </tr>                         
                                @endforeach                                 
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        
      
    </div>
@endcan
@endsection