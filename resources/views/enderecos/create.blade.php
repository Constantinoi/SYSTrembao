@extends('layouts.base')

@section('conteudo')
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cadastro de Endereço</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <br />
                        @include('errors._erro')
                        <form action="{{route('enderecos.store')}}" method="post"  class="form-horizontal form-label-left">
                          {{ csrf_field() }}
                          <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
                          @include('enderecos._dados')
                          <div class="ln_solid"></div>      

                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-success">Cadastrar</button>
                              <button class="btn btn-primary" type="reset">Limpar</button>          
                              <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>         
                          </div>
                          
                        </form>           
                      </div>
                  </div>                                
                </div>             
              </div>       
            </div>     
          </div>

@endsection