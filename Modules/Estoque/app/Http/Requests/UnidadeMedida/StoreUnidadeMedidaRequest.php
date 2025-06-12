<?php

namespace Modules\Estoque\Http\Requests\UnidadeMedida;

use Illuminate\Foundation\Http\FormRequest;

class StoreUnidadeMedidaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome_unidade' => 'required|string|unique:unidade_medidas,nome_unidade|max:20',
            'sigla' => 'required|string|min:2|max:2'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
