<?php

namespace Modules\Vendas\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CondicaoPagamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Vendas\Models\CondicaoPagamento::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

