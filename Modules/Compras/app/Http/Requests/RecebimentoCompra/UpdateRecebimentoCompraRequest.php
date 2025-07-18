<?php

namespace Modules\Compras\Http\Requests\RecebimentoCompra;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRecebimentoCompraRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pedido_compra_id' => 'sometimes|uuid|exists:pedido_compras,id',
            'nota_fiscal_entrada_id' => 'nullable|uuid|exists:nota_fiscal_entradas,id',
            'data_recebimento' => 'sometimes|date',
            'responsavel_recebimento' => 'sometimes|string|max:255',
            'observacoes' => 'nullable|string',
            'status' => 'nullable|string|in:PENDENTE,CONFERIDO,CANCELADO',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}