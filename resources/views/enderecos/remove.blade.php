@extends ('layouts.base')

@section('conteudo')
    <div class="panel panel-default">
        
            <div class="panel-heading">Deseja Remover o Endereco?</div>
            <div class="panel-body">
                <form method="post" action="{{route('enderecos.destroy', $endereco->id)}}">  
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}  
                    <div class="row">
                            <div class="col-md-12">
                            
                                <h4>Tem certeza que deseja remover o endereco?</h4>

                                <p>Cep : {{$endereco->cep}}</p>
                                <p>Logradouro :{{$endereco->logradouro}}</p>
                                <p>Numero: {{$endereco->num}}</p>                                                                 
                                <p>Bairro :{{$endereco->bairro}}</p>
                                <p>Complemento :{{$endereco->complemento}}</p>
                            
                            </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Remover</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                </form>    
            </div>
    </div>
        
@endsection    