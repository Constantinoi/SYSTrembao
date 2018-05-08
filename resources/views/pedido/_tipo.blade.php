                    <div class="form-group">
                        <label id="tipo" class="" for="tipo_pedido_id"> Tipo:
                         
                            <select id="tipo_pedido_id" name="tipo_pedido_id">
                              @foreach($tipos as $tipo)
                                @if(isset($pedido) && ($pedido->tipo_pedido_id == $tipo->id))
                                  <option value="{{$tipo->id}}" selected>{{ $tipo->nome }}</option> 
                                @else
                                  <option value="{{$tipo->id}}">{{ $tipo->nome }}</option> 
                                @endif
                                                           
                              @endforeach 
                            </select>
                          
                        </label>    
                     
                      </div>