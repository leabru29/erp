<?php

namespace Modules\Compras\Http\Requests\ItemCotacao;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemCotacaoRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'descricao' => 'sometimes|string|max:255',
            'quantidade' => 'sometimes|integer|min:1',
            'preco_unitario' => 'sometimes|numeric|min:0',
            'subtotal' => 'sometimes|numeric|min:0',
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
