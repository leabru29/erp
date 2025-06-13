<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\RH\Http\Requests\Afastamento\StoreAfastamentoRequest;
use Modules\RH\Http\Requests\Afastamento\UpdateAfastamentoRequest;
use Modules\RH\Models\Afastamento;

class AfastamentoController extends Controller
{
    public function store(StoreAfastamentoRequest $request): JsonResponse
    {
        $afastamento = Afastamento::create($request->validated());

        return response()->json([
            'message' => 'Afastamento cadastrado com sucesso!',
            'data' => $afastamento,
        ], 201);
    }

    public function update(UpdateAfastamentoRequest $request, Afastamento $afastamento): JsonResponse
    {
        $afastamento->update($request->validated());

        return response()->json([
            'message' => 'Afastamento atualizado com sucesso!',
            'data' => $afastamento,
        ]);
    }

    public function destroy(Afastamento $afastamento): JsonResponse
    {
        $afastamento->delete();

        return response()->json(['message' => 'Afastamento removido com sucesso.']);
    }
}
