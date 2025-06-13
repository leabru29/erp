<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Afastamento;
use Modules\RH\Models\Colaborador;

class AfastamentoFactory extends Factory
{
    protected $model = Afastamento::class;

    public function definition(): array
    {
        return [
            'colaborador_id' => Colaborador::factory(),
            'data_inicio' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'data_fim' => $this->faker->optional()->dateTimeBetween('now', '+1 year')->format('Y-m-d'),
            'motivo' => $this->faker->sentence(3),
            'observacoes' => $this->faker->optional()->paragraph,
            'tipo_afastamento' => $this->faker->randomElement(['médico', 'licença', 'férias']),
        ];
    }
}

