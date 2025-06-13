<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\RH\Http\Requests\Colaborador\StoreColaboradorRequest;
use Modules\RH\Http\Requests\Colaborador\UpdateColaboradorRequest;
use Modules\RH\Models\Colaborador;

class ColaboradorController extends Controller
{
    public function store(StoreColaboradorRequest $request): JsonResponse
    {
        Colaborador::create($request->validated());
        return response()->json(['message' => 'Colaborador cadastrado com sucesso!'], 201);
    }

    public function update(UpdateColaboradorRequest $request, Colaborador $colaborador): JsonResponse
    {
        $colaborador->update($request->validated());
        return response()->json(['message' => 'Colaborador atualizado com sucesso!']);
    }

    public function show(Colaborador $colaborador): JsonResponse
    {
        return response()->json($colaborador);
    }

    public function destroy(Colaborador $colaborador): JsonResponse
    {
        $colaborador->delete();
        return response()->json(['message' => 'Colaborador excluído com sucesso!']);
    }
}
