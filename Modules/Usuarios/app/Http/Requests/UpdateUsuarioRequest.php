<?php

namespace Modules\Usuarios\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:usuarios,email,' . $this->route('usuarios'),
            'senha' => 'sometimes|min:6|max:8',
            'telefone' => 'string',
            'cpf' => 'sometimes|formato_cpf|unique:usuarios,cpf,' . $this->route('usuarios'),
            'cargo' => 'sometimes|string',
            'nivel_acesso' => 'sometimes|in:admin,gerente,usuario',
            'ativo' => 'boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
