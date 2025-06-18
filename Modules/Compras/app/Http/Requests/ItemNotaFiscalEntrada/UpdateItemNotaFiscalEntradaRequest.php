<?php

namespace Modules\Compras\Http\Requests\ItemNotaFiscalEntrada;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemNotaFiscalEntradaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nota_fiscal_entrada_id' => 'sometimes|uuid|exists:nota_fiscal_entradas,id',
            'produto_id' => 'sometimes|uuid|exists:produtos,id',
            'item_pedido_compra_id' => 'nullable|uuid|exists:item_pedido_compras,id',
            'descricao' => 'sometimes|string|max:255',
            'quantidade' => 'sometimes|numeric|min:0.01',
            'valor_unitario' => 'sometimes|numeric|min:0',
            'desconto' => 'nullable|numeric|min:0',
            'icms' => 'nullable|numeric|min:0',
            'ipi' => 'nullable|numeric|min:0',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}