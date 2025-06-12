<?php

namespace Modules\Estoque\Http\Requests\Fornecedor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFornecedorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'razao_social' => 'sometimes|string|max:255',
            'nome_fantasia' => 'sometimes|string|max:255',
            'cnpj' => 'sometimes|cpf_ou_cnpj|unique:fornecedores,cnpj',
            'inscricao_estadual' => 'sometimes|string|unique:fornecedores,inscricao_estadual',
            'inscricao_municipal' => 'sometimes|string|unique:fornecedores,inscricao_municipal',
            'email' => 'sometimes|email|max:255|unique:fornecedores,email',
            'telefone' => 'nullable|celular_com_ddd|max:20',
            'celular' => 'sometimes|celular_com_ddd|max:20',
            'site' => 'nullable|url|max:255',
            'observacoes' => 'nullable|string',
            'cep' => 'sometimes|formato_cep|size:9',
            'logradouro' => 'sometimes|string|max:255',
            'numero' => 'sometimes|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'sometimes|string|max:100',
            'cidade' => 'sometimes|string|max:100',
            'estado' => 'sometimes|string|size:2',
            'banco' => 'sometimes|string|max:100',
            'agencia' => 'sometimes|string|max:20',
            'conta' => 'sometimes|string|max:20',
            'tipo_conta' => 'sometimes|string|in:conta_corrente,conta_poupanca,outros',
            'pix' => 'sometimes|string|max:255',
            'responsavel' => 'sometimes|string|max:255',
            'ativo' => 'boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
