<?php

namespace Modules\Estoque\Http\Requests\Fornecedor;

use Illuminate\Foundation\Http\FormRequest;

class StoreFornecedorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'razao_social' => 'required|string|max:255',
            'nome_fantasia' => 'required|string|max:255',
            'cnpj' => 'required|cpf_ou_cnpj|unique:fornecedores,cnpj',
            'inscricao_estadual' => 'required|string|unique:fornecedores,inscricao_estadual',
            'inscricao_municipal' => 'required|string|unique:fornecedores,inscricao_municipal',
            'email' => 'required|email|max:255|unique:fornecedores,email',
            'telefone' => 'nullable|celular_com_ddd|max:20',
            'celular' => 'required|celular_com_ddd|max:20',
            'site' => 'nullable|url|max:255',
            'observacoes' => 'nullable|string',
            'cep' => 'required|formato_cep|size:9',
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:10',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|size:2',
            'banco' => 'required|string|max:100',
            'agencia' => 'required|string|max:20',
            'conta' => 'required|string|max:20',
            'tipo_conta' => 'required|string|in:conta_corrente,conta_poupanca,outros',
            'pix' => 'required|string|max:255',
            'responsavel' => 'required|string|max:255',
            'ativo' => 'boolean',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
