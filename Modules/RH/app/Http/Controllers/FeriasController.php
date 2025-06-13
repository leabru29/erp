<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\RH\Http\Requests\Ferias\StoreFeriasRequest;
use Modules\RH\Http\Requests\Ferias\UpdateFeriasRequest;
use Modules\RH\Models\Ferias;

class FeriasController extends Controller
{
    public function index(): JsonResponse
    {
        $ferias = Ferias::with('colaborador')->latest()->get();
        return response()->json($ferias);
    }

    public function store(StoreFeriasRequest $request): JsonResponse
    {
        $ferias = Ferias::create($request->validated());
        return response()->json([
            'message' => 'Férias cadastradas com sucesso!',
            'data' => $ferias
        ], 201);
    }

    public function show(Ferias $ferias): JsonResponse
    {
        return response()->json($ferias->load('colaborador'));
    }

    public function update(UpdateFeriasRequest $request, Ferias $ferias): JsonResponse
    {
        $ferias->update($request->validated());
        return response()->json([
            'message' => 'Férias atualizadas com sucesso!',
            'data' => $ferias
        ]);
    }

    public function destroy(Ferias $ferias): JsonResponse
    {
        $ferias->delete();
        return response()->json(['message' => 'Férias removidas com sucesso!']);
    }
}
