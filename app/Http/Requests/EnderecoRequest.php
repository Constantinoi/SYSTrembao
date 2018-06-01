<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'cep.required'=>'Informe o CEP',
            'logradouro.required'=>'Informe o Endereço',
            'bairro.required'=>'Informe o Bairro',
            'num.required'=>'Informe o Numero',
           
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
            'cep'=> 'required',
            'logradouro'=>'required',
            'bairro'=>'required',
            'num'=>'required',
        ];
    }
}
