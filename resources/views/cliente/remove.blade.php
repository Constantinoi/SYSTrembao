@extends ('layouts.admin')

@section('content')
    <div class="panel panel-default">
        
            <div class="panel-heading">Deseja Remover o cargo?</div>
            <div class="panel-body">
                <form method="post" action="{{route('cargos.destroy', $cargo->id)}}">  
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}  
                    <div class="row">
                            <div class="col-md-12">
                            
                                <h4>Tem certeza que deseja remover o cargo</h4>

                                <p>Nome Cargo: {{$cargo->nomeCargo}}</p>
                                <p>Tempo de Experiencia: {{$cargo->tempoExperiencia}}</p>
                                <p>Escolaridade: {{$cargo->escolaridade->tipo}}</p>
                            
                            </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Remover</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Cancelar</a>
                </form>    
            </div>
    </div>
        
@endsection    