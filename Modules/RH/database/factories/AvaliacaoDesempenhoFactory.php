<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\AvaliacaoDesempenho;
use Modules\RH\Models\Colaborador;

class AvaliacaoDesempenhoFactory extends Factory
{
    protected $model = AvaliacaoDesempenho::class;

    public function definition(): array
    {
        return [
            'colaborador_id' => Colaborador::factory(),
            'data_avaliacao' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'nota' => $this->faker->numberBetween(1, 10),
            'comentarios' => $this->faker->optional()->paragraph,
            'avaliador' => $this->faker->name,
        ];
    }
}

