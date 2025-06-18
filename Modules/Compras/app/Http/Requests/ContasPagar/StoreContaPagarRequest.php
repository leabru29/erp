<?php

namespace Modules\Compras\Http\Requests\ContasPagar;

use Illuminate\Foundation\Http\FormRequest;

class StoreContaPagarRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'descricao' => 'required|string|max:255',
            'valor_total' => 'required|numeric|min:0',
            'data_emissao' => 'required|date',
            'data_vencimento' => 'required|date|after_or_equal:data_emissao',
            'forma_pagamento' => 'nullable|string|max:50',
            'observacoes' => 'nullable|string',
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
