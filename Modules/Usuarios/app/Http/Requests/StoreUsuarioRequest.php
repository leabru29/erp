<?php

namespace Modules\Usuarios\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuarioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:usuarios,email' . $this->route('usuario'),
            'senha' => 'required|min:6|max:8',
            'telefone' => 'required|celular_com_ddd',
            'cpf' => 'required|formato_cpf|unique:usuarios,cpf,' . $this->route('usuario'),
            'cargo' => 'required|string',
            'nivel_acesso' => 'required|in:admin,gerente,usuario',
            'ativo' => 'boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'telefone.celular_com_ddd' => 'Insira um telefone ou celular com número válido com ddd.'
        ];
    }
}
