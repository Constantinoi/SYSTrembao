
@extends ('layouts.admin')

@section('content')
    <div class="panel panel-default">
        
            <div class="panel-heading">Detalhes do cargo</div>
            <div class="panel-body">
                <div class="row">
                        <div class="col-md-12">
                        
                            <h4>Sobre o Cargo</h4>

                            <p>Nome Cargo: {{$cargo->nomeCargo}}</p>
                            <p>Tempo de Experiência: {{$cargo->tempoExperiencia}}</p>
                            <p>Escolaridade: {{$cargo->escolaridade->tipo}}</p>
                        
                        </div>
                </div>
            </div>
    </div>
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection    
