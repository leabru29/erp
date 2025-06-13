<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\RH\Http\Requests\AvaliacaoDesempenho\StoreAvaliacaoDesempenhoRequest;
use Modules\RH\Http\Requests\AvaliacaoDesempenho\UpdateAvaliacaoDesempenhoRequest;
use Modules\RH\Models\AvaliacaoDesempenho;

class AvaliacaoDesempenhoController extends Controller
{
    public function store(StoreAvaliacaoDesempenhoRequest $request): JsonResponse
    {
        $avaliacao = AvaliacaoDesempenho::create($request->validated());

        return response()->json([
            'message' => 'Avaliação registrada com sucesso!',
            'data' => $avaliacao,
        ], 201);
    }

    public function update(UpdateAvaliacaoDesempenhoRequest $request, AvaliacaoDesempenho $avaliacao): JsonResponse
    {
        $avaliacao->update($request->validated());

        return response()->json([
            'message' => 'Avaliação atualizada com sucesso!',
            'data' => $avaliacao,
        ]);
    }

    public function destroy(AvaliacaoDesempenho $avaliacao): JsonResponse
    {
        $avaliacao->delete();

        return response()->json(['message' => 'Avaliação removida com sucesso.']);
    }
}
