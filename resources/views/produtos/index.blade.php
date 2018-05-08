
@extends('layouts.base')

@section('conteudo')
    <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Produtos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <a href="{{route('produtos.create')}}"> <button class="btn btn-success "> Novo</button></a>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                   <div class="row">
                      @foreach ($produtos as $produto)
                        <div class="col-md-55">
                        <div class="thumbnail ">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{url($produto->imagem)}}" alt="image" />
                            <div class="mask no-caption">
                              <div class="tools tools-bottom">
                                <a href="{{route('produtos.edit', $produto->id)}}" ><i class="fa fa-edit"></i></a>
                                <a href="{{route('produtos.remove',$produto->id)}}"><i class="fa fa-trash-o"></i></a>
                                <a href="{{route('produtos.show', $produto->id)}}" ><i class="fa fa-eye"></i></a>
                              </div>
                            </div>
                            <div class="caption">
                              <p class="center"><strong>{{$produto->nome}}</strong>
                              </p>
                              <p>{{$produto->descricao}}</p>
                            </div>
                          </div>
                          <div class="caption">
                            <p class="center"><strong>{{$produto->nome}}</strong>
                            </p>
                            <p>{{$produto->descricao}}</p>
                              <p><span data-id="{{$produto->produtoStatus->id}}" class="sProd label label-default">{{$produto->produtoStatus->nome}}</span></p>
                          </div>
                        </div>
                      </div>

                      @endforeach  
                   </div>
                   
                  </div>
                </div>
              </div>
          </div>
    
@endsection
@section('scripts')
<script>
  $(document).ready(function(){

  });
  </script>
@endsection 