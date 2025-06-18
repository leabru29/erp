<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Compras\Http\Requests\ItemPedidoCompra\StoreItemPedidoCompraRequest;
use Modules\Compras\Http\Requests\ItemPedidoCompra\UpdateItemPedidoCompraRequest;
use Modules\Compras\Models\ItemPedidoCompra;

class ItemPedidoCompraController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ItemPedidoCompra::with('pedidoCompra')->get());
    }

    public function store(StoreItemPedidoCompraRequest $request): JsonResponse
    {
        $item = ItemPedidoCompra::create($request->validated());

        return response()->json([
            'message' => 'Item do pedido de compra criado com sucesso!',
            'data' => $item,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        return response()->json(ItemPedidoCompra::with('pedidoCompra')->findOrFail($id));
    }

    public function update(UpdateItemPedidoCompraRequest $request, string $id): JsonResponse
    {
        $item = ItemPedidoCompra::findOrFail($id);
        $item->update($request->validated());

        return response()->json(['message' => 'Item do pedido de compra atualizado com sucesso.']);
    }

    public function destroy(string $id): JsonResponse
    {
        $item = ItemPedidoCompra::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Item do pedido de compra removido.']);
    }
}
