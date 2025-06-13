<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Departamento;

class DepartamentoFactory extends Factory
{
    protected $model = Departamento::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->company,
            'descricao' => $this->faker->optional()->sentence,
            'ativo' => true,
        ];
    }
}

