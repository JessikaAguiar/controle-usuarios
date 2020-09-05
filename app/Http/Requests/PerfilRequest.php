<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Perfil;

class PerfilRequest extends FormRequest
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
    public function rules()
    {
        return [
            'nome' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Campo obrigatório'
        ];
    }
    public function persist(Perfil $perfil){
        $perfil->nome = $this->nome;

        $perfil->save();

    }
}
