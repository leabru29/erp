<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Compras\Http\Requests\ItemNotaFiscalEntrada\StoreItemNotaFiscalEntradaRequest;
use Modules\Compras\Http\Requests\ItemNotaFiscalEntrada\UpdateItemNotaFiscalEntradaRequest;
use Modules\Compras\Models\ItemNotaFiscalEntrada;

class ItemNotaFiscalEntradaController extends Controller
{
    public function index()
    {
        $itens = ItemNotaFiscalEntrada::with('notaFiscalEntrada', 'produto')->get();
        return response()->json($itens);
    }

    public function store(StoreItemNotaFiscalEntradaRequest $request)
    {
        $dados = $request->validated();
        $dados['valor_total'] = ($dados['quantidade'] ?? 0) * ($dados['valor_unitario'] ?? 0) - ($dados['desconto'] ?? 0);

        $item = ItemNotaFiscalEntrada::create($dados);

        return response()->json($item, 201);
    }

    public function show(ItemNotaFiscalEntrada $item)
    {
        return response()->json($item->load('notaFiscalEntrada', 'produto'));
    }

    public function update(UpdateItemNotaFiscalEntradaRequest $request, ItemNotaFiscalEntrada $item)
    {
        $dados = $request->validated();
        $dados['valor_total'] = ($dados['quantidade'] ?? 0) * ($dados['valor_unitario'] ?? 0) - ($dados['desconto'] ?? 0);

        $item->update($dados);

        return response()->json($item);
    }

    public function destroy(ItemNotaFiscalEntrada $item)
    {
        $item->delete();

        return response()->json(null, 204);
    }
}