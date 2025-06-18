<?php

namespace Modules\Compras\Http\Requests\NotaFiscaoEntrada;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNotaFiscaEntradaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'numero' => 'sometimes|string|max:20',
            'serie' => 'sometimes|string|max:5',
            'chave_acesso' => 'sometimes|string|size:44|unique:nota_fiscal_entradas,chave_acesso',
            'modelo' => 'sometimes|string|max:5',
            'natureza_operacao' => 'sometimes|string|max:100',
            'fornecedor_id' => 'sometimes|uuid|exists:fornecedores,id',
            'data_emissao' => 'sometimes|date',
            'data_entrada' => 'sometimes|date',
            'valor_produtos' => 'sometimes|numeric',
            'valor_frete' => 'nullable|numeric',
            'valor_seguro' => 'nullable|numeric',
            'valor_desconto' => 'nullable|numeric',
            'valor_icms' => 'nullable|numeric',
            'valor_ipi' => 'nullable|numeric',
            'valor_total' => 'sometimes|numeric',
            'status' => 'in:PENDENTE,PROCESSADA,CANCELADA',
            'xml_path' => 'nullable|string',
            'observacoes' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}