<?php

namespace Modules\RH\Http\Requests\AvaliacaoDesempenho;

use Illuminate\Foundation\Http\FormRequest;

class StoreAvaliacaoDesempenhoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'required|exists:colaboradors,id',
            'data_avaliacao' => 'required|date',
            'nota' => 'required|integer|min:0|max:10',
            'comentarios' => 'nullable|string',
            'avaliador' => 'nullable|string|max:255',
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
