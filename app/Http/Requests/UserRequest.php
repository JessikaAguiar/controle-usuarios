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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'perfils_id' => 'required',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return [
            'min' => 'Campo deve possuir no mínimo 8 caracteres',
            'required' => 'Todos os campos são obrigatórios'
        ];

    }
}
