<?php

namespace Modules\Compras\Http\Requests\ItemPedidoCompra;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemPedidoCompraRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'pedido_compra_id' => 'required|exists:pedido_compras,id',
            'produto_id' => 'nullable|exists:produtos,id',
            'descricao' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'preco_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
