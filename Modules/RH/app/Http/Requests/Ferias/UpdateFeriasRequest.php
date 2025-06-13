<?php

namespace Modules\RH\Http\Requests\Ferias;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFeriasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'inicio' => 'sometimes|date|before_or_equal:fim',
            'fim' => 'sometimes|date|after_or_equal:inicio',
            'dias' => 'sometimes|integer|min:1',
            'observacoes' => 'nullable|string',
            'aprovado' => 'boolean',
        ];
    }
}
