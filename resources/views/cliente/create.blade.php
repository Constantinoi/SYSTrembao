@extends('layouts.base')

@section('conteudo')
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Dados  do Cliente</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Editar</a>
                          </li>
                          <li><a href="#">Excluir</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
    <div class="x_content">
                    <br />
                    @if(count($errors) > 0)
                      <div class="alert alert-danger">
                        <ul>
                          @foreach($errors->all() as $error)
                            <li>
                              {{$error}}
                            </li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                    <form action="{{route('cliente.store')}}" method="post" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="nome"  class="form-control col-md-7 col-xs-12" value="{{old('nome')}}" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input name="data_nascimento" class="date form-control col-md-7 col-xs-12" type="text" id="data_nascimento" required="required" value="{{old('data_nascimento')}}">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-2">
                          <div class="form-group">
                            <label for="telefone_1" class="control-label col-md-3 col-sm-3 col-xs-12">Telefone</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_1" id="telefone_1"  value="{{old('telefone_1')}}" >
                            </div>
                          </div>
                        </div>
                         <div class="col-md-4 col-sm-4 col-xs-6">
                          <div class="form-group">
                            <label for="telefone_2" class="control-label col-md-3 col-sm-3 col-xs-12">Celular</span></label>
                            <div class="col-md-6 col-sm-4 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="telefone_2" id="telefone_2" classe="telefone"  value="{{old('telefone_2')}}">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="observacao" class="control-label col-md-3 col-sm-3 col-xs-12">Observações</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  class="form-control col-md-7 col-xs-12" type="text" name="observacao" row="5"  value="{{old('observacao')}}" >
                        </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Cep<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="cep" onblur="pesquisacep(this.value);" class="form-control col-md-7 col-xs-12" id="cep" required="required" value="{{old('cep')}}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Logradouro<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="logradouro" required="required" id="logradouro" class="form-control col-md-7 col-xs-12"  value="{{old('logradouro')}}">
                        </div>
                      </div>
                      
                                         
                        <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-2">
                          <div class="form-group">
                            <label for="numero" class="control-label col-md-3 col-sm-3 col-xs-12">Número<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" name="num" id="num"  value="{{old('num')}}">
                            </div>
                          </div>
                        </div>

                        <div class=" col-sm-4 ">
                          <div class="form-group">
                            <label for="numero" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input  class="form-control col-md-7 col-xs-12" type="text" id="bairro" name="bairro" required="required"  value="{{old('bairro')}}">
                            </div>
                          </div>
                        </div>
  
                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome">Complemento</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="complemento"  class="form-control col-md-7 col-xs-12"  value="{{old('complemento')}}">
                        </div>
                    </div>
                      
                      <div class="ln_solid"></div>                 
                  </div>
              </div>
               
                 
                   
                
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Cadastrar</button>
						              <button class="btn btn-primary" type="reset">Limpar</button>          
                      </div>
                    </form>
                     
                  </div>             
                </div>       
              </div>     
            </div>

@endsection