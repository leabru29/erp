<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\RH\Http\Requests\FolhaPagamento\StoreFolhaPagamentoRequest;
use Modules\RH\Http\Requests\FolhaPagamento\UpdateFolhaPagamentoRequest;
use Modules\RH\Models\FolhaPagamento;

class FolhaPagamentoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(FolhaPagamento::with('colaborador')->get());
    }

    public function store(StoreFolhaPagamentoRequest $request): JsonResponse
    {
        $folha = FolhaPagamento::create($request->validated());
        return response()->json([
            'message' => 'Folha de pagamento criada com sucesso!',
            'data' => $folha
        ], 201);
    }

    public function show(FolhaPagamento $folhaPagamento): JsonResponse
    {
        return response()->json($folhaPagamento->load('colaborador'));
    }

    public function update(UpdateFolhaPagamentoRequest $request, FolhaPagamento $folhaPagamento): JsonResponse
    {
        $folhaPagamento->update($request->validated());
        return response()->json([
            'message' => 'Folha de pagamento atualizada com sucesso!',
            'data' => $folhaPagamento
        ]);
    }

    public function destroy(FolhaPagamento $folhaPagamento): JsonResponse
    {
        $folhaPagamento->delete();
        return response()->json(['message' => 'Folha de pagamento removida com sucesso!']);
    }
}
