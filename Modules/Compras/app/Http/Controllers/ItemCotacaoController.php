<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Compras\Http\Requests\ItemCotacao\StoreItemCotacaoRequest;
use Modules\Compras\Http\Requests\ItemCotacao\UpdateItemCotacaoRequest;
use Modules\Compras\Models\ItemCotacao;

class ItemCotacaoController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(ItemCotacao::with('cotacao')->get());
    }

    public function store(StoreItemCotacaoRequest $request): JsonResponse
    {
        $item = ItemCotacao::create($request->validated());

        return response()->json([
            'message' => 'Item de cotação criado com sucesso!',
            'data' => $item,
        ], 201);
    }

    public function show(ItemCotacao $itemCotacao): JsonResponse
    {
        return response()->json($itemCotacao);
    }

    public function update(UpdateItemCotacaoRequest $request, ItemCotacao $itemCotacao): JsonResponse
    {
        $itemCotacao->update($request->validated());
        return response()->json(['message' => 'Item de cotação atualizado com sucesso.']);
    }

    public function destroy(ItemCotacao $itemCotacao): JsonResponse
    {
        $itemCotacao->delete();
        return response()->json(['message' => 'Item de cotação removido.']);
    }
}
