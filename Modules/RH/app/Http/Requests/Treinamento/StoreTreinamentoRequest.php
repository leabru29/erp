<?php

namespace Modules\RH\Http\Requests\Treinamento;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreinamentoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'carga_horaria' => 'required|integer|min:1',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
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
