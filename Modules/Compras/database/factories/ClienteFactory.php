<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Compras\Models\Cliente::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

