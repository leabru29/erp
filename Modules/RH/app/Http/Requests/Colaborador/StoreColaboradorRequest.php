<?php

namespace Modules\RH\Http\Requests\Colaborador;

use Illuminate\Foundation\Http\FormRequest;

class StoreColaboradorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cargo_id' => 'required|exists:cargos,id',
            'departamento_id' => 'required|exists:departamentos,id',
            'nome_completo' => 'required|string|max:255',
            'cpf' => 'required|cpf|unique:colaboradors,cpf',
            'rg' => 'required|string|max:20',
            'data_nascimento' => 'required|date',
            'genero' => 'required|string',
            'estado_civil' => 'required|string',
            'nacionalidade' => 'required|string',
            'email' => 'required|email|unique:colaboradors,email',
            'telefone' => 'nullable|string|max:20',
            'celular' => 'required|string|max:20',
            'cep' => 'required|string|max:10',
            'logradouro' => 'required|string|max:255',
            'numero' => 'required|string|max:20',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'required|string|max:100',
            'cidade' => 'required|string|max:100',
            'estado' => 'required|string|max:2',
            'matricula' => 'required|string|unique:colaboradors,matricula',
            'data_admissao' => 'required|date',
            'tipo_contrato' => 'required|in:clt,pj,temporario',
            'salario' => 'required|numeric|min:0',
            'ativo' => 'required|boolean',
            'banco' => 'required|string|max:100',
            'agencia' => 'required|string|max:10',
            'conta' => 'required|string|max:20',
            'tipo_conta' => 'required|in:conta_corrente,conta_poupanca,outros',
            'pix' => 'nullable|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
