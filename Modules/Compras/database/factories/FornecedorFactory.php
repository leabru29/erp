<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\Fornecedor;

class FornecedorFactory extends Factory
{
    protected $model = Fornecedor::class;

    public function definition(): array
    {
        return [
            'razao_social' => $this->faker->company,
            'nome_fantasia' => $this->faker->companySuffix,
            'cnpj' => $this->faker->unique()->cnpj(false),
            'inscricao_estadual' => $this->faker->numerify('###.###.###.###'),
            'inscricao_municipal' => $this->faker->numerify('###.###.###'),
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'celular' => $this->faker->cellphoneNumber,
            'site' => $this->faker->url,
            'observacoes' => $this->faker->paragraph,
            'cep' => $this->faker->postcode,
            'logradouro' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'complemento' => $this->faker->secondaryAddress,
            'bairro' => $this->faker->citySuffix,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->stateAbbr,
            'banco' => $this->faker->randomElement(['Itaú', 'Bradesco', 'Caixa', 'Banco do Brasil']),
            'agencia' => $this->faker->numerify('####'),
            'conta' => $this->faker->numerify('########'),
            'tipo_conta' => $this->faker->randomElement(['conta_corrente', 'conta_poupanca', 'outros']),
            'pix' => $this->faker->uuid,
            'responsavel' => $this->faker->name,
            'ativo' => true,
        ];
    }
}

