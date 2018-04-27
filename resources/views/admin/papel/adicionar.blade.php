@extends('layouts.base')

@section('conteudo')

 <div class="row">
	<div class="col-md-10 col-sm-10 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Adicionar Papel<small>Cadastre um novo Papel</small></h2>
		
				<div class="clearfix"></div>
			</div>
		
		<div class="x_content">
			<br />
			<form class="form-horizontal" action="{{ route('papeis.store') }}" method="post">
			{{csrf_field()}}
			@include('admin.papel._form')
			
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<br>
				<div class="form-group">
					<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						<a href="{{ route('papeis.index') }}"type="button" class="btn btn-primary">Voltar</a>
						<button class="btn btn-warning" type="reset">Limpar</button>
						<button type="submit" class="btn btn-success">Adicionar</button>
					</div>
				</div>

			</form>
		</div>
	</div>
	

@endsection

