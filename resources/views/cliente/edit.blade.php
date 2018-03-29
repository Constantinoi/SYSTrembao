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
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Nome<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nome" required="required" class="form-control col-md-7 col-xs-12" value="{{$cliente->nome}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="data_nascimento" class="date form-control col-md-7 col-xs-12" required="required" type="text" value="{{date( 'd/m/Y', strtotime ($cliente->data_nascimento))}}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-2">
                          <div class="form-group">
                            <label for="telefone_1" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_1" data-inputmask="'mask' : '(99) 99999-9999'" value="{{$cliente->telefone_1}}">
                            </div>
                          </div>
                        </div>
                         <div class="col-md-4 col-sm-4 col-xs-6">
                          <div class="form-group">
                            <label for="telefone_2" class="control-label col-md-3 col-sm-3 col-xs-12">Celular</label>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_2" value="{{$cliente->telefone_2}}">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="observacao" class="control-label col-md-3 col-sm-3 col-xs-12">Observações</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" type="text" name="observacao" row="5"  value="{{$cliente->observacao}}">
                        </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Cep</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="cep"  required="required" class="form-control col-md-7 col-xs-12" value="{{$cliente->endereco->cep}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Logradouro</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="logradouro" required="required" class="form-control col-md-7 col-xs-12" value="{{$cliente->endereco->logradouro}}">
                        </div>
                      </div>
                      
                                         
                        <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-2">
                          <div class="form-group">
                            <label for="numero" class="control-label col-md-3 col-sm-3 col-xs-12">Número</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="num" value="{{$cliente->endereco->num}}">
                            </div>
                          </div>
                        </div>

                        <div class=" col-sm-4 ">
                          <div class="form-group">
                            <label for="numero" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="bairro" value="{{$cliente->endereco->bairro}}" >
                            </div>
                          </div>
                        </div>
  
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Complemento<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="complemento" required="required" class="form-control col-md-7 col-xs-12" value="{{$cliente->endereco->complemento}}">
                        </div>
                    </div>
                      
                      <div class="ln_solid"></div>                 
                  </div>
              </div>
               
                 
                   
                
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Editar</button>
						             <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>         
                      </div>
                    </form>
                     
                  </div>             
                </div>       
              </div>     
            </div>

@endsection