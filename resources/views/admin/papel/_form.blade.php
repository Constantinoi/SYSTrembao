
<div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
	<label for="nome" class="control-label col-md-3 col-sm-3 col-xs-12">Nome</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input id="nome" type="text" class="form-control col-md-7 col-xs-12" name="nome" value="{{ isset($registro->nome) ? $registro->nome : '' }}"  autofocus>

		@if ($errors->has('nome'))
			<span class="help-block">
				<strong>{{ $errors->first('nome') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
	<label for="descricao" class="control-label col-md-3 col-sm-3 col-xs-12">Descrição</label>
	<div class="col-md-6 col-sm-6 col-xs-12">
		<input id="descricao" type="text" class="form-control col-md-7 col-xs-12" name="descricao" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}" >

		@if ($errors->has('descricao'))
			<span class="help-block">
				<strong>{{ $errors->first('descricao') }}</strong>
			</span>
		@endif
	</div>
</div>


