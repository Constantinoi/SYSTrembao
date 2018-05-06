<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'imagem.image'=>'Insira uma imagem',
            'nome.required'=>'Informe o nome do Produto',
            'valor.required'=>'Digite o valor',
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
            'imagem'=>'image',
            'valor'=>'required'
        ];
    }
}
