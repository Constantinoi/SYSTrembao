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
            'nome.min'=>'O nome deve ter no mínimo 4 Caracteres',
            'nome.max'=>'O nome deve ter no máximo 30 Caracteres',
            'data_nascimento.required'=>'Informe a Data de Nascimento',
            'telefone_2.required'=>'Informe o Celular',
            'cep.required'=>'Informe o Cep',
            'logradouro.required'=>'Informe o Endereço',
            'bairro.required'=>'Informe o Bairro',
            'num.required'=>'Informe o numero da casa',
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
            'data_nascimento'=>'required',
            'telefone_2'=>'required',
            'cep'=>'required',
            'logradouro'=>'required',
            'bairro'=>'required',
            'num'=>'required'
        ];
    }
}
