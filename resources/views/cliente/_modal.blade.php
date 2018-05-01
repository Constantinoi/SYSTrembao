{{--  modal delete  --}}
<div class="modal fade" id="removeCliente" tabindex="-1" role="dialog" aria-labelledby="removeClienteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="removeClienteLabel">Remover Cliente</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('cliente.destroy', $cliente->id)}}">  
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}  
                    <div class="row">
                            <div class="col-md-12">
                            
                                <h4>Tem certeza que deseja remover o cliente?</h4>

                                <p>Cliente : {{$cliente->nome}}</p>
                                <p>Data Nascimento :{{$cliente->data_nascimento}}</p>
                                <p>Telefone: {{$cliente->telefone_1}}</p>                                                                 
                                <p>Celular :{{$cliente->telefone_2}}</p>
                                <p>Observação : {{$cliente->observacao}}</p>
                                <p>CEP : {{$cliente->endereco->cep}}</p>
                                <p>Logradouro :{{$cliente->endereco->logradouro}}</p>
                                <p>Número :{{$cliente->endereco->num}}</p>
                                <p>Bairro :{{$cliente->endereco->bairro}}</p>
                                <p>Complemento : {{$cliente->endereco->complemento}}</p>
                            
                            </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Remover</button>
                    <a href="" class="btn btn-warning" data-dismiss="modal">Fechar</a>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

{{--  modal show  --}}
<div class="modal fade" id="showCliente" tabindex="-1" role="dialog" aria-labelledby="showClienteLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="showClienteLabel">Dados do Cliente</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
                    <div class="row">
                            <div class="col-md-12">
                            
                                <h4>Sobre o Cliente</h4>

                                <p><b>Cliente :</b> {{$cliente->nome}}</p>
                                <p><b>Data Nascimento :</b>{{$cliente->data_nascimento}}</p>
                                <p><b>Telefone: </b>{{$cliente->telefone_1}}</p>                                                                 
                                <p><b>Celular :</b>{{$cliente->telefone_2}}</p>
                                <p><b>Observação :</b> {{$cliente->observacao}}</p>
                                <p><b>CEP : </b>{{$cliente->endereco->cep}}</p>
                                <p><b>Logradouro :</b>{{$cliente->endereco->logradouro}}</p>
                                <p><b>Número :</b>{{$cliente->endereco->num}}</p>
                                <p><b>Bairro :</b>{{$cliente->endereco->bairro}}</p>
                                <p><b>Complemento :</b> {{$cliente->endereco->complemento}}</p>
                            
                            </div>
                    </div>
                    <a href="" class="btn btn-warning" data-dismiss="modal">Fechar</a>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>