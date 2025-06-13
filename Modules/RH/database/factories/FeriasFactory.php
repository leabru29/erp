<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Colaborador;

class FeriasFactory extends Factory
{
    protected $model = \Modules\RH\Models\Ferias::class;

    public function definition(): array
    {
        $inicio = $this->faker->dateTimeBetween('-1 year', 'now');
        $fim = (clone $inicio)->modify('+15 days');

        return [
            'colaborador_id' => Colaborador::factory(),
            'inicio' => $inicio->format('Y-m-d'),
            'fim' => $fim->format('Y-m-d'),
            'dias' => 15,
            'observacoes' => $this->faker->optional()->sentence,
            'aprovado' => $this->faker->boolean,
        ];
    }
}

