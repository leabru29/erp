<?php

namespace Modules\Estoque\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Estoque\Models\Fornecedor;
use Illuminate\Support\Str;

class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;

    public function definition(): array
    {
        return [
            'razao_social' => fake()->company,
            'nome_fantasia' => fake()->companySuffix,
            'cnpj' => fake()->cnpj(),
            'inscricao_estadual' => fake()->unique()->numerify('###.###.###.###'),
            'inscricao_municipal' => fake()->unique()->numerify('###.###.###'),
            'email' => fake()->unique()->safeEmail,
            'telefone' => fake()->cellphoneNumber(),
            'celular' => fake()->cellphoneNumber(),
            'site' => fake()->optional()->url,
            'observacoes' => fake()->optional()->paragraph,
            'cep' => fake()->postcode,
            'logradouro' => fake()->streetName,
            'numero' => fake()->buildingNumber,
            'complemento' => fake()->optional()->secondaryAddress,
            'bairro' => fake()->citySuffix,
            'cidade' => fake()->city,
            'estado' => fake()->stateAbbr,
            'banco' => fake()->randomElement(['Banco do Brasil', 'Caixa', 'Bradesco', 'Itaú', 'Nubank']),
            'agencia' => fake()->numerify('####'),
            'conta' => fake()->numerify('########'),
            'tipo_conta' => fake()->randomElement(['corrente', 'poupança', 'salário']),
            'pix' => fake()->uuid,
            'responsavel' => fake()->name,
            'ativo' => true,
        ];
    }
}

