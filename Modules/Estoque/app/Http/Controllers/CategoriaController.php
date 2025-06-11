<?php

namespace Modules\Estoque\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Estoque\Http\Requests\Categoria\StoreCategoriaRequest;
use Modules\Estoque\Http\Requests\Categoria\UpdateCategoriaRequest;
use Modules\Estoque\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(): JsonResponse
    {
        $categorias = Categoria::with('produtos', 'fornecedor')->get();
        return response()->json($categorias);
    }

    public function store(StoreCategoriaRequest $request): JsonResponse
    {
        $dados = $request->validated();
        Categoria::create($dados);
        return response()->json(['message' => 'Categoria cadastrada com sucesso!'], 201);
    }

    public function show(Categoria $categoria): JsonResponse
    {
        return response()->json($categoria);
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria): JsonResponse 
    {
        $dados = $request->validated();
        $categoria->update($dados);
        return response()->json(['message' => 'Categoria atualizada com sucesso!']);
    }

    public function destroy(Categoria $categoria): JsonResponse
    {
        $categoria->delete();
        return response()->json(['message' => 'Categoria deletada com sucesso!']);
    }
}
