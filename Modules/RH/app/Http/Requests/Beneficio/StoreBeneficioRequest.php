<?php

namespace Modules\RH\Http\Requests\Beneficio;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeneficioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'tipo' => 'required|in:vale_transporte,vale_refeicao,vale_alimentacao,plano_saude,plano_odontologico,outros',
            'valor' => 'nullable|numeric|min:0',
            'ativo' => 'boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
