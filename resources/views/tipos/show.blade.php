
@extends ('layouts.base')

@section('conteudo')
    <div class="panel panel-default">
        
            <div class="panel-heading">Detalhes</div>
            <div class="panel-body">
                <div class="row">
                        <div class="col-md-12">
                        
                            <h4>Sobre o Tipo</h4>

                            <p>Nome: {{$tipo->nome}}</p>
                            <p>Descrição: {{$tipo->descricao}}</p>
                        
                        </div>
                </div>
            </div>
    </div>
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection    
