<?php

namespace Modules\RH\Http\Requests\Afastamento;

use Illuminate\Foundation\Http\FormRequest;

class StoreAfastamentoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'required|exists:colaboradors,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'nullable|date|after_or_equal:data_inicio',
            'motivo' => 'required|string|max:255',
            'observacoes' => 'nullable|string',
            'tipo_afastamento' => 'required|string|max:100',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
