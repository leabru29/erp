<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\RH\Http\Requests\PontoRegistro\StorePontoRegistroRequest;
use Modules\RH\Http\Requests\PontoRegistro\UpdatePontoRegistroRequest;
use Modules\RH\Models\PontoRegistro;

class PontoRegistroController extends Controller
{
    public function store(StorePontoRegistroRequest $request): JsonResponse
    {
        $registro = PontoRegistro::create($request->validated());

        return response()->json([
            'message' => 'Registro de ponto cadastrado com sucesso!',
            'data' => $registro,
        ], 201);
    }

    public function update(UpdatePontoRegistroRequest $request, PontoRegistro $ponto): JsonResponse
    {
        $ponto->update($request->validated());

        return response()->json([
            'message' => 'Registro de ponto atualizado com sucesso!',
            'data' => $ponto,
        ]);
    }
}
