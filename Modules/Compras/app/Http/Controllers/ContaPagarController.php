<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Compras\Http\Requests\ContasPagar\StoreContaPagarRequest;
use Modules\Compras\Http\Requests\ContasPagar\UpdateContaPagarRequest;
use Modules\Compras\Models\ContaPagar;

class ContaPagarController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ContaPagar::with('fornecedor')->get());
    }

    public function store(StoreContaPagarRequest $request): JsonResponse
    {
        $conta = ContaPagar::create($request->validated());

        return response()->json([
            'message' => 'Conta a pagar registrada com sucesso!',
            'data' => $conta,
        ], 201);
    }

    public function show(ContaPagar $contaPagar): JsonResponse
    {
        return response()->json($contaPagar);
    }

    public function update(UpdateContaPagarRequest $request, ContaPagar $contaPagar): JsonResponse
    {
        $contaPagar->update($request->validated());
        return response()->json(['message' => 'Conta atualizada com sucesso!']);
    }

    public function destroy(ContaPagar $contaPagar): JsonResponse
    {
        $contaPagar->delete();
        return response()->json(['message' => 'Conta removida com sucesso.']);
    }
}
