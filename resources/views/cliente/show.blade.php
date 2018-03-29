
@extends ('layouts.base')

@section('conteudo')
    <div class="panel panel-default">
        
            <div class="panel-heading">Detalhes do Cliente</div>
            <div class="panel-body">
                <div class="row">
                        <div class="col-md-12">
                        
                            <h4>Sobre o Cargo</h4>

                            <p>Nome Cliente : {{$cliente->nome}}</p>
                            <p>Data de Nascimento: {{$cliente->data_nascimento}}</p>
                            <p>Telefone: {{$cliente->telefone_1}}</p>                                                                 
                            <p>Celular: {{$cliente->telefone_2}}</p>
                        
                        </div>
                </div>
            </div>
    </div>
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection    
