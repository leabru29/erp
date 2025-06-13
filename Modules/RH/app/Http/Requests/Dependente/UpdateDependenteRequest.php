<?php

namespace Modules\RH\Http\Requests\Dependente;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDependenteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'sometimes|string|max:255',
            'data_nascimento' => 'sometimes|date',
            'parentesco' => 'sometimes|string|max:50',
            'cpf' => 'nullable|cpf|unique:dependentes,cpf',
            'dependente_ir' => 'boolean',
            'beneficiario' => 'boolean',
            'observacoes' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
