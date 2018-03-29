@extends ('layouts.base')

@section('conteudo')
    <div class="panel panel-default">
        
            <div class="panel-heading">Deseja Remover o cliente?</div>
            <div class="panel-body">
                <form method="post" action="{{route('cliente.destroy', $cliente->id)}}">  
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}  
                    <div class="row">
                            <div class="col-md-12">
                            
                                <h4>Tem certeza que deseja remover o cliente?</h4>

                                <p>Cliente : {{$cliente->nome}}</p>
                                <p>Data Nascimento :{{date( 'd/m/Y', strtotime ($cliente->data_nascimento))}}</p>
                                <p>Telefone: {{$cliente->telefone_1}}</p>                                                                 
                                <p>Celular :{{$cliente->telefone_2}}</p>
                            
                            </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Remover</button>
                    <a href="{{ url()->previous() }}" class="btn btn-default">Voltar</a>
                </form>    
            </div>
    </div>
        
@endsection    