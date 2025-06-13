<?php

namespace Modules\RH\Http\Requests\Afastamento;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAfastamentoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'sometimes|exists:colaboradors,id',
            'data_inicio' => 'sometimes|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'motivo' => 'sometimes|string|max:255',
            'observacoes' => 'nullable|string',
            'tipo_afastamento' => 'sometimes|string|max:100',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
