<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nome.required'=>'Informe o nome do Cliente',
            'nome.min'=>'Mínimo 4 Caracteres',
            'nome.max'=>'Máximo 100 Caracteres',
            'telefone_1.min'=>'O Campo Telefone deve Conter no mínimo 14 dígitos',
            'telefone_1.max'=>'O Campo Telefone deve Conter até 15 dígitos',
            'telefone_2.min'=>'O Campo Celular deve Conter no mínimo 15 dígitos',
            'telefone_2.max'=>'O Campo Celular deve Conter até 15 dígitos'
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=> 'required|min:4|max:100',
            'telefone_1'=>'required|min:14|max:15',
            'telefone_2'=>'required|min:15|max:15'
        ];
    }
}
