<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Compras\Http\Requests\Fornecedor\StoreFornecedorRequest;
use Modules\Compras\Http\Requests\Fornecedor\UpdateFornecedorRequest;
use Modules\Compras\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Fornecedor::all());
    }

    public function store(StoreFornecedorRequest $request): JsonResponse
    {
        $fornecedor = Fornecedor::create($request->validated());

        return response()->json([
            'message' => 'Fornecedor cadastrado com sucesso!',
            'data' => $fornecedor,
        ], 201);
    }

    public function show(Fornecedor $fornecedor): JsonResponse
    {
        return response()->json($fornecedor);
    }

    public function update(UpdateFornecedorRequest $request, Fornecedor $fornecedor): JsonResponse
    {
        $fornecedor->update($request->validated());

        return response()->json(['message' => 'Fornecedor atualizado com sucesso!']);
    }

    public function destroy(Fornecedor $fornecedor): JsonResponse
    {
        $fornecedor->delete();
        return response()->json(['message' => 'Fornecedor removido com sucesso.']);
    }
}
