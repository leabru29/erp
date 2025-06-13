<?php

namespace Modules\RH\Http\Requests\Treinamento;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTreinamentoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'titulo' => 'sometimes|string|max:255',
            'descricao' => 'nullable|string',
            'carga_horaria' => 'sometimes|integer|min:1',
            'data_inicio' => 'sometimes|date',
            'data_fim' => 'sometimes|date|after_or_equal:data_inicio',
            'local' => 'nullable|string|max:255',
            'instrutor' => 'nullable|string|max:255',
            'ativo' => 'boolean',
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
