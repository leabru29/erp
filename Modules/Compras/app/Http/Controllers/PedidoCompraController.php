<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Compras\Http\Requests\PedidoCompra\StorePedidoCompraRequest;
use Modules\Compras\Http\Requests\PedidoCompra\UpdatePedidoCompraRequest;
use Modules\Compras\Models\PedidoCompra;

class PedidoCompraController extends Controller
{
    public function index()
    {
        $pedidos = PedidoCompra::with('fornecedor', 'usuario', 'itens')->paginate(15);
        return response()->json($pedidos);
    }

    public function show(PedidoCompra $pedidoCompra)
    {
        $pedidoCompra->load('fornecedor', 'usuario', 'itens');
        return response()->json($pedidoCompra);
    }

    public function store(StorePedidoCompraRequest $request): JsonResponse
    {
        $pedido = PedidoCompra::create($request->validated());
        return response()->json($pedido, 201);
    }

    public function update(UpdatePedidoCompraRequest $request, PedidoCompra $pedidoCompra): JsonResponse
    {
        $pedidoCompra->update($request->validated());
        return response()->json($pedidoCompra);
    }

    public function destroy(PedidoCompra $pedidoCompra): JsonResponse
    {
        $pedidoCompra->delete();
        return response()->json(null, 204);
    }
}