<?php

namespace Modules\Compras\Http\Requests\Fornecedor;

use Illuminate\Foundation\Http\FormRequest;

class StoreFornecedorRequest extends FormRequest
{
     public function rules(): array
    {
        return [
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:18|unique:fornecedores,cnpj',
            'email' => 'nullable|email',
            'telefone' => 'nullable|string',
            'celular' => 'nullable|string',
            'ativo' => 'boolean',
        ];
    }
    
    public function authorize(): bool
    {
        return true;
    }
}
