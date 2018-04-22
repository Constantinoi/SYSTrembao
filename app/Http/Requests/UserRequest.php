<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name.required'=>'Informe o nome do Usuário',
            'name.min'=>'Mínimo 4 Caracteres',
            'name.max'=>'Máximo 100 Caracteres',
            'email.min'=>'O Campo Email deve Conter no mínimo 10 dígitos',
            'email.max'=>'O Campo Email deve Conter até 30 dígitos',
            'password.min'=>'O Campo senha deve conter no mínimo 8 dígitos',
            'password.max'=>'O Campo senha deve conter até 15 dígitos'
        ];
    }

   
    public function rules()
    {
        return [
            'name'=> 'required|min:4|max:30',
            'email'=>'required|min:10|max:30',  
            'password'=>'required|min:8|max:15'
        ];
    }
}
