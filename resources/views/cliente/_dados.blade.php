   
    <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nome"> Nome <span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="nome"  class="form-control col-md-7 col-xs-12" value="{{old('nome')}}" required="required">
    </div>
    </div>
    <div class="form-group">
    <label for="data_nascimento" class="control-label col-md-3 col-sm-3 col-xs-12">Data de Nascimento<span class="required">*</span></label>
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
        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cep">Cep<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="cep" onblur="pesquisacep(this.value);" class="form-control col-md-7 col-xs-12" id="cep" required="required" value="{{old('cep')}}">
    </div>
    </div>
    <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logradouro">Logradouro<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="logradouro" required="required" id="logradouro" class="form-control col-md-7 col-xs-12"  value="{{old('logradouro')}}">
    </div>
    </div>
    
    <div class="row">                 
    <div class="col-md-4 col-sm-6 col-xs-6 col-md-offset-2">
        <div class="form-group">
        <label for="num" class="control-label col-md-3 col-sm-3 col-xs-12">Número<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  class="form-control col-md-7 col-xs-12" type="text" name="num" id="num"  value="{{old('num')}}">
        </div>
        </div>
    </div>
    
    <div class="col-md-4 col-sm-4 col-xs-6">
        <div class="form-group">
        <label for="bairro" class="control-label col-md-3 col-sm-3 col-xs-12">Bairro<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input  class="form-control col-md-7 col-xs-12" type="text" id="bairro" name="bairro" required="required"  value="{{old('bairro')}}">
        </div>
        </div>
    </div>
    </div>


    <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="complemento">Complemento</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input type="text" name="complemento"  class="form-control col-md-7 col-xs-12"  value="{{old('complemento')}}">
    </div>
    </div>
    
    