<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Cargo;
use Modules\RH\Models\Departamento;

class ColaboradorFactory extends Factory
{
    protected $model = \Modules\RH\Models\Colaborador::class;

    public function definition(): array
    {
        return [
            'cargo_id' => Cargo::factory(),
            'departamento_id' => Departamento::factory(),
            'nome_completo' => $this->faker->name,
            'cpf' => $this->faker->unique()->cpf(false),
            'rg' => $this->faker->numerify('##.###.###-#'),
            'data_nascimento' => $this->faker->date('Y-m-d', '-18 years'),
            'genero' => $this->faker->randomElement(['masculino', 'feminino', 'outro']),
            'estado_civil' => $this->faker->randomElement(['solteiro', 'casado', 'divorciado']),
            'nacionalidade' => 'brasileiro',
            'email' => $this->faker->unique()->safeEmail,
            'telefone' => $this->faker->phoneNumber,
            'celular' => $this->faker->cellphoneNumber,
            'cep' => $this->faker->postcode,
            'logradouro' => $this->faker->streetName,
            'numero' => $this->faker->buildingNumber,
            'complemento' => $this->faker->secondaryAddress,
            'bairro' => $this->faker->citySuffix,
            'cidade' => $this->faker->city,
            'estado' => $this->faker->stateAbbr,
            'matricula' => strtoupper($this->faker->bothify('MATR-####')),
            'data_admissao' => $this->faker->date,
            'data_demissao' => null,
            'tipo_contrato' => $this->faker->randomElement(['clt', 'pj', 'temporario']),
            'salario' => $this->faker->randomFloat(2, 1500, 10000),
            'ativo' => true,
            'banco' => $this->faker->randomElement(['Banco do Brasil', 'Caixa', 'Bradesco', 'Itaú']),
            'agencia' => $this->faker->numerify('####'),
            'conta' => $this->faker->numerify('########'),
            'tipo_conta' => $this->faker->randomElement(['conta_corrente', 'conta_poupanca', 'outros']),
            'pix' => $this->faker->uuid,
        ];
    }
}

