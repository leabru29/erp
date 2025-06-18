<?php

namespace Modules\Compras\Http\Requests\ItemNotaFiscalEntrada;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemNotaFiscalEntradaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nota_fiscal_entrada_id' => 'required|uuid|exists:nota_fiscal_entradas,id',
            'produto_id' => 'required|uuid|exists:produtos,id',
            'item_pedido_compra_id' => 'nullable|uuid|exists:item_pedido_compras,id',
            'descricao' => 'required|string|max:255',
            'quantidade' => 'required|numeric|min:0.01',
            'valor_unitario' => 'required|numeric|min:0',
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