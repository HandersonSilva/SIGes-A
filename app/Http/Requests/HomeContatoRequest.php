<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Request;

class HomeContatoRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function messages(){
        return [
            'nome_contato.required'=>'Preencha com um nome por favor',
            'nome_contato.max'=>'O campo nome ultrapassa o limite de caracteres permitidos',
            'tel_contato.required'=>'Preencha com um telefone',
            'tel_contato.max'=>'Telefone deve conter no máximo 11 caracteres',
            'email_contato.required'=>'Preencha o campo email',
            'email_contato.max'=>'Email deve conter no máximo 50 caracteres',
            'textAreaContato.required'=>'Importante que coloque sua mensagem,para que possamos ajudá-lo'
          ];
     }



    public function rules()
    {
        return [
            "nome_contato"=>'required|max:100',
            "tel_contato"=>'required|max:11',
            "email_contato"=>'required|email|unique:users|max:50',
            "textAreaContato"=>'required'
        ];
    }
}
