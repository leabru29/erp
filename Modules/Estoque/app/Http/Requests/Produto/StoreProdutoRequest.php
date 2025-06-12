<?php

namespace Modules\Estoque\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class StoreProdutoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'categoria_id' => 'required|exists:categorias,id',
            'nome_produto' => 'required|string|unique:produtos,nome_produto',
            'descricao_produto' => 'required|string',
            'preco' => 'required|numeric|min:0',
            'sku' => 'nullable|string|max:64',
            'ncm' => 'nullable|digits:8',
            'cest' => 'nullable|digits:7',
            'upc' => 'nullable|digits:12',
            'ean' => 'nullable|digits_between:8,14',
            'quantidade' => 'required|integer|min:0',
            'unidade_medida_id' => 'required|exists:unidade_medidas,id',
            'comprimento' => 'required|numeric|min:0',
            'altura' => 'required|numeric|min:0',
            'largura' => 'required|numeric|min:0',
            'peso' => 'required|numeric|min:0',
            'unidade_peso' => 'required|in:quilograma,grama',
            'imagem_principal' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
