<?php

namespace Modules\Compras\Http\Requests\NotaFiscaoEntrada;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotaFiscaEntradaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'numero' => 'required|string|max:20',
            'serie' => 'required|string|max:5',
            'chave_acesso' => 'required|string|size:44|unique:nota_fiscal_entradas,chave_acesso',
            'modelo' => 'required|string|max:5',
            'natureza_operacao' => 'required|string|max:100',
            'fornecedor_id' => 'required|uuid|exists:fornecedores,id',
            'data_emissao' => 'required|date',
            'data_entrada' => 'required|date',
            'valor_produtos' => 'required|numeric',
            'valor_frete' => 'nullable|numeric',
            'valor_seguro' => 'nullable|numeric',
            'valor_desconto' => 'nullable|numeric',
            'valor_icms' => 'nullable|numeric',
            'valor_ipi' => 'nullable|numeric',
            'valor_total' => 'required|numeric',
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