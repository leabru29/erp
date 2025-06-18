<?php

namespace Modules\Compras\Http\Requests\PedidoCompra;

use Illuminate\Foundation\Http\FormRequest;

class StorePedidoCompraRequest extends FormRequest
{
    public function rules(): array
    {
        return [
        'numero' => 'required|string|unique:pedido_compras,numero|max:50',
        'fornecedor_id' => 'required|uuid|exists:fornecedores,id',
        'data_pedido' => 'required|date',
        'data_previsao_entrega' => 'nullable|date|after_or_equal:data_pedido',
        'valor_total' => 'nullable|numeric|min:0',
        'status' => 'nullable|string|in:ABERTO,EM_ANALISE,APROVADO,RECEBIDO,CANCELADO',
        'observacoes' => 'nullable|string|max:1000',
        'usuario_id' => 'nullable|uuid|exists:usuarios,id',
    ];
    }

    public function authorize(): bool
    {
        return true;
    }
}