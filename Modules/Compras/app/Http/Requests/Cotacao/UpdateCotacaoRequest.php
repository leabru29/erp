<?php

namespace Modules\Compras\Http\Requests\Cotacao;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCotacaoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'numero' => 'sometimes|string|max:50|unique:cotacoes,numero,' . $this->cotacao,
            'data_emissao' => 'sometimes|date',
            'data_validade' => 'nullable|date|after_or_equal:data_emissao',
            'valor_total' => 'sometimes|numeric|min:0',
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
