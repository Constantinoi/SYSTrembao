
@extends ('layouts.base')

@section('conteudo')
    <div class="panel panel-default">
        
            <div class="panel-heading">Detalhes</div>
            <div class="panel-body">
                <div class="row">
                        <div class="col-md-12">
                        
                            <h4>Sobre o Produto</h4>

                                <p><img width="200px" src="{{ url($produto->imagem)}}" alt=""></p>
                                <p>Nome: {{$produto->nome}}</p>
                                <p>Descrição: {{$produto->descricao}}</p>
                                <p>Valor: R$ {{$produto->valor}}</p>
                        
                        </div>
                </div>
            </div>
    </div>
        <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
@endsection    
