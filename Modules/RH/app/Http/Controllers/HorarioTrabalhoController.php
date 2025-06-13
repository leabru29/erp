<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\RH\Http\Requests\HorarioTrabalho\StoreHorarioTrabalhoRequest;
use Modules\RH\Http\Requests\HorarioTrabalho\UpdateHorarioTrabalhoRequest;
use Modules\RH\Models\HorarioTrabalho;

class HorarioTrabalhoController extends Controller
{
    public function store(StoreHorarioTrabalhoRequest $request): JsonResponse
    {
        $horario = HorarioTrabalho::create($request->validated());

        return response()->json([
            'message' => 'Horário de trabalho cadastrado com sucesso!',
            'data' => $horario,
        ], 201);
    }

    public function update(UpdateHorarioTrabalhoRequest $request, HorarioTrabalho $horario): JsonResponse
    {
        $horario->update($request->validated());

        return response()->json([
            'message' => 'Horário de trabalho atualizado com sucesso!',
            'data' => $horario,
        ]);
    }
}
