<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Compras\Http\Requests\RecebimentoCompra\StoreRecebimentoCompraRequest;
use Modules\Compras\Http\Requests\RecebimentoCompra\UpdateRecebimentoCompraRequest;
use Modules\Compras\Models\RecebimentoCompra;

class RecebimentoCompraController extends Controller
{
    public function index(): JsonResponse
    {
        $recebimentos = RecebimentoCompra::with('pedidoCompra', 'notaFiscalEntrada')->paginate(15);
        return response()->json($recebimentos);
    }

    public function show(RecebimentoCompra $recebimentoCompra)
    {
        $recebimentoCompra->load('pedidoCompra', 'notaFiscalEntrada');
        return response()->json($recebimentoCompra);
    }

    public function store(StoreRecebimentoCompraRequest $request): JsonResponse
    {
        $recebimento = RecebimentoCompra::create($request->validated());
        return response()->json($recebimento, 201);
    }

    public function update(UpdateRecebimentoCompraRequest $request, RecebimentoCompra $recebimentoCompra): JsonResponse
    {
        $recebimentoCompra->update($request->validated());
        return response()->json($recebimentoCompra);
    }

    public function destroy(RecebimentoCompra $recebimentoCompra): JsonResponse
    {
        $recebimentoCompra->delete();
        return response()->json(null, 204);
    }
}