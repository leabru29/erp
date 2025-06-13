<?php

namespace Modules\RH\Http\Requests\AvaliacaoDesempenho;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAvaliacaoDesempenhoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'sometimes|exists:colaboradors,id',
            'data_avaliacao' => 'sometimes|date',
            'nota' => 'sometimes|integer|min:0|max:10',
            'comentarios' => 'nullable|string',
            'avaliador' => 'nullable|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
