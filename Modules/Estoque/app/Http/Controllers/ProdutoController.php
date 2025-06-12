<?php

namespace Modules\Estoque\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Estoque\Http\Requests\Produto\StoreProdutoRequest;
use Modules\Estoque\Http\Requests\Produto\UpdateProdutoRequest;
use Modules\Estoque\Models\Produto;

class ProdutoController extends Controller
{
    public function index(): JsonResponse
    {
        $produtos = Produto::with('unidadeMedida', 'categoria.fornecedor')->get();
        return response()->json($produtos);
    }

    public function store(StoreProdutoRequest $request): JsonResponse 
    {
        $dados = $request->validated();
        $dados['codigo_produto'] = rand(111111111, 999999999);
        Produto::create($dados);
        return response()->json(['message' => 'Produto cadastrado com sucesso!'], 201);
    }

    public function show(Produto $produto): JsonResponse
    {
        return response()->json($produto);
    }

    public function update(UpdateProdutoRequest $request, Produto $produto): JsonResponse 
    {
        $dados = $request->validated();
        $produto->update($dados);
        return response()->json(['message' => 'Produto atualizado com sucesso!']);
    }

    public function destroy(Produto $produto): JsonResponse
    {
        $produto->delete();
        return response()->json(['message' => 'Produto excluído com sucesso!']);
    }
}
