<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMunicipio extends FormRequest
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
        $id = $this->segment(3);

        return [
            'nome'        => "required|min:3|max:255|unique:municipios,nome,{id},id",
            'descricao'   => 'nullable|min:3|max:1000',

        ];
    }

    public function messages()
    {
        return [
            'required' => '*:attribute* é um campo de preenchimento obrigatório!',
            'min' => 'O Campo *:attribute* deve ter no mínimo :min caracteres',
            'max' => 'O Campo *:attribute* deve ter no máximo :max caracteres',
            'unique' => 'Já existe um Munício com esse nome cadastrado, favor verificar com administrador do sistema.',

        ];
    }
}
