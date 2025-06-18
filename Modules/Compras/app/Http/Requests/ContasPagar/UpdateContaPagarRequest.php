<?php

namespace Modules\Compras\Http\Requests\ContasPagar;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContaPagarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'descricao' => 'sometimes|string|max:255',
            'valor_total' => 'sometimes|numeric|min:0',
            'data_emissao' => 'sometimes|date',
            'data_vencimento' => 'sometimes|date',
            'data_pagamento' => 'nullable|date',
            'valor_pago' => 'nullable|numeric|min:0',
            'forma_pagamento' => 'nullable|string|max:50',
            'observacoes' => 'nullable|string',
            'pago' => 'boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
