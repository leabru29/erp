<?php

namespace Modules\Estoque\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Estoque\Http\Requests\UnidadeMedida\StoreUnidadeMedidaRequest;
use Modules\Estoque\Http\Requests\UnidadeMedida\UpdateUnidadeMedidaRequest;
use Modules\Estoque\Models\UnidadeMedida;

class UnidadeMedidaController extends Controller
{
    public function index(): JsonResponse
    {
        $unidadesMedidas = UnidadeMedida::all();
        return response()->json($unidadesMedidas);
    }

    public function store(StoreUnidadeMedidaRequest $request): JsonResponse
    {
        $dados = $request->validated();
        UnidadeMedida::create($dados);
        return response()->json(['message' => 'Unidade de medida criada com sucesso!'], 201);
    }

    public function show(UnidadeMedida $unidadeMedida)
    {
        $unidadeMedida->load('produtos');
        return response()->json($unidadeMedida);
    }
    
    public function update(UpdateUnidadeMedidaRequest $request, UnidadeMedida $unidadeMedida): JsonResponse 
    {
        $dados = $request->validated();
        $unidadeMedida->update($dados);
        return response()->json(['message' => 'Unidade de medida atualizada com sucesso!']);
    }

    public function destroy(UnidadeMedida $unidadeMedida): JsonResponse
    {
        $unidadeMedida->delete();
        return response()->json(['message' => 'Unidade de medida excluída com sucesso!']);
    }
}
