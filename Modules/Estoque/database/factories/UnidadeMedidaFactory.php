<?php

namespace Modules\Estoque\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Estoque\Models\UnidadeMedida;

class UnidadeMedidaFactory extends Factory
{
    protected $model = UnidadeMedida::class;

    public function definition(): array
    {
        return [
            'nome_unidade' => fake()->randomElement(['grama', 'kilograma']),
            'sigla' => fake()->randomElement(['g', 'kg']),
        ];
    }
}

