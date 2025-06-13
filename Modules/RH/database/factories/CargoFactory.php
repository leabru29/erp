<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Cargo;
use Modules\RH\Models\Departamento;

class CargoFactory extends Factory
{
    protected $model = Cargo::class;

    public function definition(): array
    {
        return [
            'departamento_id' => Departamento::factory(),
            'nome' => $this->faker->jobTitle,
            'descricao' => $this->faker->optional()->sentence,
            'salario_base' => $this->faker->randomFloat(2, 1500, 10000),
            'ativo' => true,
        ];
    }
}

