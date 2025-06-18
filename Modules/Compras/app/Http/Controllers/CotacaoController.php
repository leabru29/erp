<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Compras\Http\Requests\Cotacao\StoreCotacaoRequest;
use Modules\Compras\Http\Requests\Cotacao\UpdateCotacaoRequest;
use Modules\Compras\Models\Cotacao;

class CotacaoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Cotacao::with('fornecedor')->get());
    }

    public function store(StoreCotacaoRequest $request): JsonResponse
    {
        $cotacao = Cotacao::create($request->validated());
        return response()->json([
            'message' => 'Cotação cadastrada com sucesso!',
            'data' => $cotacao,
        ], 201);
    }

    public function show(Cotacao $cotacao): JsonResponse
    {
        return response()->json($cotacao);
    }

    public function update(UpdateCotacaoRequest $request, Cotacao $cotacao): JsonResponse
    {
        $cotacao->update($request->validated());
        return response()->json(['message' => 'Cotação atualizada com sucesso!']);
    }

    public function destroy(Cotacao $cotacao): JsonResponse
    {
        $cotacao->delete();
        return response()->json(['message' => 'Cotação excluída com sucesso.']);
    }
}
