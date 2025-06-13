<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Treinamento;

class TreinamentoFactory extends Factory
{
    protected $model = Treinamento::class;

    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(3),
            'descricao' => $this->faker->paragraph,
            'carga_horaria' => $this->faker->numberBetween(4, 40),
            'data_inicio' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'data_fim' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            'local' => $this->faker->address,
            'instrutor' => $this->faker->name,
            'ativo' => $this->faker->boolean(90),
        ];
    }
}

