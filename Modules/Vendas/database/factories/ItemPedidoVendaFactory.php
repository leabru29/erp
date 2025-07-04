<?php

namespace Modules\Vendas\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemPedidoVendaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Vendas\Models\ItemPedidoVenda::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

