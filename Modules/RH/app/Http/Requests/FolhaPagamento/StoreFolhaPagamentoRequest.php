<?php

namespace Modules\RH\Http\Requests\FolhaPagamento;

use Illuminate\Foundation\Http\FormRequest;

class StoreFolhaPagamentoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'colaborador_id' => 'required|exists:colaboradors,id',
            'referencia' => 'required|string',
            'salario_base' => 'required|numeric|min:0',
            'adicionais' => 'nullable|numeric|min:0',
            'descontos' => 'nullable|numeric|min:0',
            'inss' => 'nullable|numeric|min:0',
            'irrf' => 'nullable|numeric|min:0',
            'valor_liquido' => 'required|numeric|min:0',
            'data_pagamento' => 'nullable|date',
            'status' => 'nullable|string|in:pendente,pago,atrasado',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
