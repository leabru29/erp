<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\RH\Models\Departamento;

class DepartamentoController extends Controller
{
    public function index(): JsonResponse
    {
        $departamentos = Departamento::all();
        return response()->json($departamentos);
    }

    public function store(Request $request): JsonResponse
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255|unique:departamentos,nome',
            'descricao' => 'nullable|string',
            'ativo' => 'required|boolean',
        ]);

        $departamento = Departamento::create($dados);

        return response()->json([
            'message' => 'Departamento criado com sucesso!',
            'data' => $departamento
        ], 201);
    }

    public function show(Departamento $departamento): JsonResponse
    {
        return response()->json($departamento);
    }

    public function update(Request $request, Departamento $departamento): JsonResponse
    {
        $dados = $request->validate([
            'nome' => 'sometimes|string|max:255|unique:departamentos,nome',
            'descricao' => 'nullable|string',
            'ativo' => 'required|boolean',
        ]);

        $departamento->update($dados);

        return response()->json(['message' => 'Departamento atualizado com sucesso!']);
    }

    public function destroy(Departamento $departamento): JsonResponse
    {
        $departamento->delete();
        return response()->json(['message' => 'Departamento excluído com sucesso!']);
    }
}
