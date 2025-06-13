<?php

namespace Modules\RH\Http\Requests\Ferias;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeriasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'colaborador_id' => 'required|uuid|exists:colaboradors,id',
            'inicio' => 'required|date|before_or_equal:fim',
            'fim' => 'required|date|after_or_equal:inicio',
            'dias' => 'required|integer|min:1',
            'observacoes' => 'nullable|string',
            'aprovado' => 'boolean',
        ];
    }
}
