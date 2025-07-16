<?php

namespace Modules\Usuarios\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsuarioRequest extends FormRequest
{
    public function rules(): array
    {
        $id = $this->usuario?->id ?? $this->route('usuario') ?? null;
        return [
            'nome' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:usuarios,email,' . $id,
            'telefone' => 'string',
            'cpf' => 'sometimes|formato_cpf|unique:usuarios,cpf,' . $id,
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