
@extends('layouts.base')

@section('conteudo')
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Tipos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>Descrição</th>
                        </tr>
                      </thead>

                      <tbody>
                          @foreach ($tipos as $dado)
                        <tr>
                            <td>{{$dado->nome}}</td>
                            <td>{{$dado->descricao}}</td>
                            <td >
                          <a href="{{route('tipos.edit', $dado->id)}}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                          <a href="{{route('tipos.remove',$dado->id)}}" class="btn btn-danger btn-xs"> <i class="fa fa-trash-o"></i></a>
                          <a href="{{route('tipos.show', $dado->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-eye"></i></a>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
    <a href="{{route('tipos.create')}}"> <button class="btn btn-primary">Adicionar Tipo</button></a>
@endsection

