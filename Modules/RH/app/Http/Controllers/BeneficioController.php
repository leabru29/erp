<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\RH\Http\Requests\Beneficio\StoreBeneficioRequest;
use Modules\RH\Http\Requests\Beneficio\UpdateBeneficioRequest;
use Modules\RH\Models\Beneficio;

class BeneficioController extends Controller
{
    public function store(StoreBeneficioRequest $request): JsonResponse
    {
        $beneficio = Beneficio::create($request->validated());

        return response()->json([
            'message' => 'Benefício cadastrado com sucesso!',
            'data' => $beneficio,
        ], 201);
    }

    public function update(UpdateBeneficioRequest $request, Beneficio $beneficio): JsonResponse
    {
        $beneficio->update($request->validated());

        return response()->json([
            'message' => 'Benefício atualizado com sucesso!',
            'data' => $beneficio,
        ]);
    }

    public function destroy(Beneficio $beneficio): JsonResponse
    {
        $beneficio->delete();

        return response()->json(['message' => 'Benefício excluído com sucesso.']);
    }
}
