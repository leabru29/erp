<?php

namespace Modules\RH\Http\Requests\HorarioTrabalho;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHorarioTrabalhoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'required|exists:colaboradors,id',
            'entrada_manha' => 'nullable|date_format:H:i',
            'saida_manha' => 'nullable|date_format:H:i',
            'entrada_tarde' => 'nullable|date_format:H:i',
            'saida_tarde' => 'nullable|date_format:H:i',
            'dias_semana' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
