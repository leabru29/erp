<?php

namespace Modules\RH\Http\Requests\PontoRegistro;

use Illuminate\Foundation\Http\FormRequest;

class StorePontoRegistroRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'required|exists:colaboradors,id',
            'data' => 'required|date',
            'entrada' => 'nullable|date_format:H:i',
            'saida_almoco' => 'nullable|date_format:H:i',
            'retorno_almoco' => 'nullable|date_format:H:i',
            'saida' => 'nullable|date_format:H:i',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
