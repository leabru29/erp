<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\RH\Http\Requests\Dependente\StoreDependenteRequest;
use Modules\RH\Http\Requests\Dependente\UpdateDependenteRequest;
use Modules\RH\Models\Dependente;

class DependenteController extends Controller
{
    public function index(): JsonResponse
    {
        $dependentes = Dependente::with('colaborador')->latest()->get();
        return response()->json($dependentes);
    }

    public function store(StoreDependenteRequest $request): JsonResponse
    {
        $dependente = Dependente::create($request->validated());
        return response()->json([
            'message' => 'Dependente cadastrado com sucesso!',
            'data' => $dependente
        ], 201);
    }

    public function show(Dependente $dependente): JsonResponse
    {
        return response()->json($dependente->load('colaborador'));
    }

    public function update(UpdateDependenteRequest $request, Dependente $dependente): JsonResponse
    {
        $dependente->update($request->validated());
        return response()->json([
            'message' => 'Dependente atualizado com sucesso!',
            'data' => $dependente
        ]);
    }

    public function destroy(Dependente $dependente): JsonResponse
    {
        $dependente->delete();
        return response()->json(['message' => 'Dependente excluído com sucesso!']);
    }
}
