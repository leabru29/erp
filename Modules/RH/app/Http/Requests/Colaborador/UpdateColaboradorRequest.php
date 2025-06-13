<?php

namespace Modules\RH\Http\Requests\Colaborador;

use Illuminate\Foundation\Http\FormRequest;

class UpdateColaboradorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'cargo_id' => 'sometimes|exists:cargos,id',
            'departamento_id' => 'sometimes|exists:departamentos,id',
            'nome_completo' => 'sometimes|string|max:255',
            'cpf' => 'sometimes|cpf',
            'rg' => 'sometimes|string|max:20',
            'data_nascimento' => 'sometimes|date',
            'genero' => 'sometimes|string',
            'estado_civil' => 'sometimes|string',
            'nacionalidade' => 'sometimes|string',
            'email' => 'sometimes|email',
            'telefone' => 'nullable|string|max:20',
            'celular' => 'sometimes|string|max:20',
            'cep' => 'sometimes|string|max:10',
            'logradouro' => 'sometimes|string|max:255',
            'numero' => 'sometimes|string|max:20',
            'complemento' => 'nullable|string|max:255',
            'bairro' => 'sometimes|string|max:100',
            'cidade' => 'sometimes|string|max:100',
            'estado' => 'sometimes|string|max:2',
            'matricula' => 'sometimes|string',
            'data_admissao' => 'sometimes|date',
            'tipo_contrato' => 'sometimes|in:clt,pj,temporario',
            'salario' => 'sometimes|numeric|min:0',
            'ativo' => 'sometimes|boolean',
            'banco' => 'sometimes|string|max:100',
            'agencia' => 'sometimes|string|max:10',
            'conta' => 'sometimes|string|max:20',
            'tipo_conta' => 'sometimes|in:conta_corrente,conta_poupanca,outros',
            'pix' => 'nullable|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
