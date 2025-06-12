<?php

namespace Modules\Estoque\Http\Requests\UnidadeMedida;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUnidadeMedidaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome_unidade' => 'sometimes|string|unique:unidade_medidas,nome_unidade|max:20',
            'sigla' => 'sometimes|string|min:2|max:2'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
