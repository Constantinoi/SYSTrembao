@extends ('layouts.base')

@section('conteudo')
    <div class="panel panel-default">
        
            <div class="panel-heading">Deseja Remover?</div>
            <div class="panel-body">
                <form method="post" action="{{route('tipos.destroy', $tipo->id)}}">  
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}  
                    <div class="row">
                            <div class="col-md-12">
                            
                                <h4>Tem certeza que deseja remover o tipo?</h4>

                                <p>Nome: {{$tipo->nome}}</p>
                                <p>Descrição: {{$tipo->descricao}}</p>
                            
                            </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Remover</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                </form>    
            </div>
    </div>
        
@endsection    