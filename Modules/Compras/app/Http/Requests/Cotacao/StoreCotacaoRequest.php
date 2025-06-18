<?php

namespace Modules\Compras\Http\Requests\Cotacao;

use Illuminate\Foundation\Http\FormRequest;

class StoreCotacaoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'numero' => 'required|string|unique:cotacoes,numero|max:50',
            'data_emissao' => 'required|date',
            'data_validade' => 'nullable|date|after_or_equal:data_emissao',
            'valor_total' => 'required|numeric|min:0',
            'condicoes_pagamento' => 'nullable|string',
            'observacoes' => 'nullable|string',
            'status' => 'in:aberta,aceita,recusada,expirada',
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
