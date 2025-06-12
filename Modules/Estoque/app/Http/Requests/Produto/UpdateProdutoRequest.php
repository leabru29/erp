<?php

namespace Modules\Estoque\Http\Requests\Produto;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdutoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'categoria_id' => 'sometimes|exists:categorias,id',
            'nome_produto' => 'sometimes|string|unique:produtos,nome_produto',
            'descricao_produto' => 'sometimes|string',
            'preco' => 'sometimes|numeric|min:0',
            'sku' => 'nullable|string|max:64',
            'ncm' => 'nullable|digits:8',
            'cest' => 'nullable|digits:7',
            'upc' => 'nullable|digits:12',
            'ean' => 'nullable|digits_between:8,14',
            'quantidade' => 'sometimes|integer|min:0',
            'unidade_medida_id' => 'sometimes|exists:unidade_medidas,id',
            'comprimento' => 'sometimes|numeric|min:0',
            'altura' => 'sometimes|numeric|min:0',
            'largura' => 'sometimes|numeric|min:0',
            'peso' => 'sometimes|numeric|min:0',
            'unidade_peso' => 'sometimes|in:quilograma,grama',
            'imagem_principal' => 'nullable|string',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
