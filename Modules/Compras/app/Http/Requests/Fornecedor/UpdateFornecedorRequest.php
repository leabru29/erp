<?php

namespace Modules\Compras\Http\Requests\Fornecedor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedorRequest extends FormRequest
{
     public function rules(): array
    {
        return [
            'razao_social' => 'sometimes|string|max:255',
            'cnpj' => 'sometimes|string|max:18|unique:fornecedores,cnpj,' . $this->fornecedor,
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
