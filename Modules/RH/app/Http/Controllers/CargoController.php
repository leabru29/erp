<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\RH\Models\Cargo;

class CargoController extends Controller
{
    public function index(): JsonResponse
    {
        $cargos = Cargo::with('departamento')->get();
        return response()->json($cargos);
    }

    public function store(Request $request): JsonResponse
    {
        $dados = $request->validate([
            'departamento_id' => 'required|exists:departamentos,id',
            'nome' => 'required|string|max:255|unique:cargos,nome',
            'descricao' => 'nullable|string',
            'salario_base' => 'required|numeric|min:0',
            'ativo' => 'required|boolean',
        ]);

        $cargo = Cargo::create($dados);

        return response()->json([
            'message' => 'Cargo criado com sucesso!',
            'data' => $cargo
        ], 201);
    }

    public function show(Cargo $cargo): JsonResponse
    {
        return response()->json($cargo);
    }

    public function update(Request $request, Cargo $cargo): JsonResponse
    {
        $dados = $request->validate([
            'departamento_id' => 'sometimes|exists:departamentos,id',
            'nome' => 'sometimes|string|max:255|unique:cargos,nome',
            'descricao' => 'nullable|string',
            'salario_base' => 'sometimes|numeric|min:0',
            'ativo' => 'required|boolean',
        ]);

        $cargo->update($dados);

        return response()->json(['message' => 'Cargo atualizado com sucesso!']);
    }

    public function destroy(Cargo $cargo): JsonResponse
    {
        $cargo->delete();
        return response()->json(['message' => 'Cargo excluído com sucesso!']);
    }
}
