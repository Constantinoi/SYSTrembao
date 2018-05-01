@extends('layouts.base')

@section('conteudo')
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editar o Cliente</h2>
                      <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        </li>
                      </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form action="{{route('cliente.update',$cliente->id)}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                      <input type="hidden" name="_method" value="PUT">
                      {{ csrf_field() }}
                      @include('cliente._dados')
                    
                      <div class="ln_solid"></div>   

                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Editar</button>
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