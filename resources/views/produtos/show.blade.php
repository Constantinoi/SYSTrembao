
@extends ('layouts.base')

@section('conteudo')
    <div class="clearfix"></div>
    <div class="panel panel-default col-md-6">
        
            <div class="panel-heading"><h4>Detalhes</h4></div>
            <div class="panel-body">
                <div class="row">
                        <div class="col-md-6">
                        
                            <h4>Sobre o Produto</h4>

                                <p><img class="img-rounded" width="256px" src="{{ url($produto->imagem)}}" alt=""></p>
                                <p>Nome: {{$produto->nome}}</p>
                                <p>Descrição: {{$produto->descricao}}</p>
                                <p>Valor: R$ {{$produto->valor}}</p>
                        
                        </div>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
            </div>
            
            
    </div>
        
@endsection    
