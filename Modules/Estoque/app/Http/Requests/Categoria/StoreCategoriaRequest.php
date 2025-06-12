<?php

namespace Modules\Estoque\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoriaRequest extends FormRequest
{
    public function rules(): array
    {
       return [
            'fornecedor_id' => 'required|exists:fornecedores,id',
            'nome_categoria' => 'required|string|min:3|max:50',
            'descricao' => 'sometimes|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
