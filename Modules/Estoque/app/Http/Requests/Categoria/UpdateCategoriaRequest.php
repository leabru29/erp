<?php

namespace Modules\Estoque\Http\Requests\Categoria;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoriaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'fornecedor_id' => 'sometimes|exists:fornecedores,id',
            'nome_categoria' => 'sometimes|string|min:3|max:50',
            'descricao' => 'sometimes|string|max:255',
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
