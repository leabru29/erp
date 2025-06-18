<?php

namespace Modules\Compras\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Modules\Compras\Http\Requests\NotaFiscaoEntrada\StoreNotaFiscaEntradaRequest;
use Modules\Compras\Http\Requests\NotaFiscaoEntrada\UpdateNotaFiscaEntradaRequest;
use Modules\Compras\Models\NotaFiscalEntrada;

class NotaFiscalEntradaController extends Controller
{
    public function index()
    {
        $notaFiscalEntradas = NotaFiscalEntrada::with('fornecedor', 'itens.produto')->get();
        return response()->json($notaFiscalEntradas);
    }

    public function store(StoreNotaFiscaEntradaRequest $request): JsonResponse
    {
        $dados = $request->validated();
        $notaFiscalEntrada = NotaFiscalEntrada::create($dados);
        return response()->json(['message' => 'Nota fiscal de entrada criada com sucesso!', 'data' => $notaFiscalEntrada], 201);
    }

    public function show(NotaFiscalEntrada $notaFiscalEntrada): JsonResponse
    {
        return response()->json($notaFiscalEntrada->load('fornecedor', 'itens.produto'));
    }

    public function update(UpdateNotaFiscaEntradaRequest $request, NotaFiscalEntrada $notaFiscalEntrada): JsonResponse
    {
        $dados = $request->validated();
        $notaFiscalEntrada->update($dados);
        return response()->json(['message' => 'Nota fiscal de entrada atualizada com sucesso!', 'data' => $notaFiscalEntrada]);
    }

    public function destroy(NotaFiscalEntrada $notaFiscalEntrada): JsonResponse
    {
        $notaFiscalEntrada->delete();
        return response()->json(['message' => 'Nota fiscal de entrada excluída com sucesso!'], 204);
    }
}