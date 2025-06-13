<?php

namespace Modules\RH\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\RH\Http\Requests\DocumentoColaborador\StoreDocumentoColaboradorRequest;
use Modules\RH\Http\Requests\DocumentoColaborador\UpdateDocumentoColaboradorRequest;
use Modules\RH\Models\DocumentoColaborador;

class DocumentoColaboradorController extends Controller
{
    public function index(): JsonResponse
    {
        $documentos = DocumentoColaborador::with('colaborador')->get();
        return response()->json($documentos);
    }

    public function store(StoreDocumentoColaboradorRequest $request): JsonResponse
    {
        $documento = DocumentoColaborador::create($request->validated());
        return response()->json([
            'message' => 'Documento cadastrado com sucesso!',
            'data' => $documento
        ], 201);
    }

    public function show(DocumentoColaborador $documentoColaborador): JsonResponse
    {
        return response()->json($documentoColaborador->load('colaborador'));
    }

    public function update(UpdateDocumentoColaboradorRequest $request, DocumentoColaborador $documentoColaborador): JsonResponse
    {
        $documentoColaborador->update($request->validated());
        return response()->json([
            'message' => 'Documento atualizado com sucesso!',
            'data' => $documentoColaborador
        ]);
    }

    public function destroy(DocumentoColaborador $documentoColaborador): JsonResponse
    {
        $documentoColaborador->delete();
        return response()->json(['message' => 'Documento excluído com sucesso!']);
    }
}
