<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Beneficio;

class BeneficioColaboradorFactory extends Factory
{
    protected $model = Beneficio::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->randomElement(['Vale Transporte', 'Vale Refeição', 'Plano de Saúde']),
            'descricao' => $this->faker->optional()->sentence,
            'tipo' => $this->faker->randomElement(['vale_transporte', 'vale_refeicao', 'vale_alimentacao', 'plano_saude', 'plano_odontologico', 'outros']),
            'valor' => $this->faker->randomFloat(2, 50, 1000),
            'ativo' => $this->faker->boolean(90),
        ];
    }
}

