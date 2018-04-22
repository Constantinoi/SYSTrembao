@extends('layouts.base')

@section('conteudo')


	<div class="col-md-10 col-sm-10 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Editar Papel<small>Cadastre um novo Papel</small></h2>
		
				<div class="clearfix"></div>
			</div>
		
		<div class="x_content">
			<br />
			<form class="form-horizontal" action="{{ route('papeis.update',$registro->id) }}" method="post">

				{{csrf_field()}}
				{{ method_field('PUT') }}
				@include('admin.papel._form')

				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<br>

				<div class="form-group">
					<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
						<a href="{{ route('papeis.index') }}"type="button" class="btn btn-primary">Voltar</a>
						
						<button type="submit" class="btn btn-success">Atualizar</button>
					</div>
				</div>
			</form>
		
		</div>	
	</div>
	

@endsection