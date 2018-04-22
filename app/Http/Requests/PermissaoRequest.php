<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissaoRequest extends FormRequest
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
            'nome.required'=>'Informe o nome da Permissão',
            'nome.min'=>'Mínimo 4 Caracteres',
            'nome.max'=>'Máximo 100 Caracteres',
            'descricao.min'=>'O Campo Email deve Conter no mínimo 10 dígitos',
            'descricao.max'=>'O Campo Email deve Conter até 30 dígitos',
            
           
        ];
    }

   
    public function rules()
    {
        return [
            'nome'=> 'required|min:4|max:30',
            'descricao'=>'required|min:10|max:30'           
        ];
    }
}
