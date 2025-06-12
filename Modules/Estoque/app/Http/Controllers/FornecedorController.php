<?php

namespace Modules\Estoque\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Estoque\Http\Requests\Fornecedor\StoreFornecedorRequest;
use Modules\Estoque\Http\Requests\Fornecedor\UpdateFornecedorRequest;
use Modules\Estoque\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(): JsonResponse
    {
        $fornecedores = Fornecedor::with('categorias.produtos')->get();
        return response()->json($fornecedores);
    }

    public function store(StoreFornecedorRequest $request): JsonResponse
    {
        $dados = $request->validated();
        Fornecedor::create($dados);
        return response()->json(['message' => 'Fornecedor cadastrado com sucesso!'], 201);
    }
    
    public function show(Fornecedor $fornecedor): JsonResponse
    {
        $fornecedor->load('categorias.produtos');
        return response()->json($fornecedor);
    }

    public function update(UpdateFornecedorRequest $request, Fornecedor $fornecedor): JsonResponse 
    {
        $dados = $request->validated();
        $fornecedor->update($dados);
        return response()->json(['message' => 'Fornecedor atualizado com sucesso!']);
    }

    public function destroy(Fornecedor $fornecedor): JsonResponse
    {
        $fornecedor->delete();
        return response()->json(['message' => 'Fornecedor excluído com sucesso!']);
    }
}
