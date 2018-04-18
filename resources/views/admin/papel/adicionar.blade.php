@extends('layouts.base')

@section('conteudo')


	


 <div class="row">
	<div class="col-md-8 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Adicionar Papel<small>Cadastre um novo Papel</small></h2>
		
				<div class="clearfix"></div>
			</div>
		
		<div class="x_content">
			<br />
			<form action="{{ route('papeis.store') }}" method="post">
			{{csrf_field()}}
			@include('admin.papel._form')
			
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<br>
				<div class="form-group">
				<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
					<a href="{{ route('papeis.index') }}"type="button" class="btn btn-danger">Voltar</a>
					<button class="btn btn-caution" type="reset">Limpar</button>
					<button type="submit" class="btn btn-success">Adicionar</button>
				</div>
				</div>

			</form>
		</div>
	</div>
	

@endsection