<?php

namespace Modules\Vendas\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VendedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Vendas\Models\Vendedor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

