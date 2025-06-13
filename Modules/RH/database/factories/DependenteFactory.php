<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Colaborador;
use Modules\RH\Models\Dependente;

class DependenteFactory extends Factory
{
    protected $model = Dependente::class;

    public function definition(): array
    {
        return [
            'colaborador_id' => Colaborador::factory(),
            'nome' => $this->faker->name(),
            'data_nascimento' => $this->faker->date('Y-m-d', '-5 years'),
            'parentesco' => $this->faker->randomElement(['filho', 'filha', 'cônjuge', 'pai', 'mãe']),
            'cpf' => $this->faker->unique()->cpf(false),
            'dependente_ir' => $this->faker->boolean(),
            'beneficiario' => $this->faker->boolean(),
            'observacoes' => $this->faker->optional()->sentence(),
        ];
    }
}

