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
            'nome.alpha'=>'O Campo Nome deve Conter apenas Letras',
            'nome.min'=>'Mínimo 4 Caracteres',
            'nome.max'=>'Máximo 100 Caracteres',
            'telefone_1.numeric'=>'O Campo Telefone deve Conter apenas Números',
        'telefone_2.numeric'=>'O Campo Celular deve Conter apenas Números'
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
            'nome'=> 'alpha|min:4|max:100',
            'telefone_1'=>'numeric',
            'telefone_2'=>'numeric'
        ];
    }
}
