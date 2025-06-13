<?php

namespace Modules\RH\Http\Requests\Dependente;

use Illuminate\Foundation\Http\FormRequest;

class StoreDependenteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'required|exists:colaboradors,id',
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'parentesco' => 'required|string|max:50',
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
