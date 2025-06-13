<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\RH\Http\Requests\Treinamento\StoreTreinamentoRequest;
use Modules\RH\Http\Requests\Treinamento\UpdateTreinamentoRequest;
use Modules\RH\Models\Treinamento;

class TreinamentoController extends Controller
{
    public function store(StoreTreinamentoRequest $request): JsonResponse
    {
        $treinamento = Treinamento::create($request->validated());

        return response()->json([
            'message' => 'Treinamento cadastrado com sucesso!',
            'data' => $treinamento,
        ], 201);
    }

    public function update(UpdateTreinamentoRequest $request, Treinamento $treinamento): JsonResponse
    {
        $treinamento->update($request->validated());

        return response()->json([
            'message' => 'Treinamento atualizado com sucesso!',
            'data' => $treinamento,
        ]);
    }

    public function destroy(Treinamento $treinamento): JsonResponse
    {
        $treinamento->delete();

        return response()->json(['message' => 'Treinamento removido com sucesso.']);
    }
}
