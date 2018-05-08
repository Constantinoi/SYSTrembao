<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PapelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function Messages(){
        return [
            'nome.required'=>'Informe o nome do Papel',
            'nome.min'=>'Mínimo 4 Caracteres',
            'nome.max'=>'Máximo 30 Caracteres',
            'descricao.min'=>'Mínimo 4 Caracteres',
            'descricao.max'=>'Máximo 30 Caracteres',
            'descricao.required'=>'Informe a descrição do papel'
            
           
        ];
    }

   
    public function rules()
    {
        return [
            'nome'=> 'required|min:4|max:30',
            'descricao'=>'required|min:4|max:30'           
        ];
    }
}
