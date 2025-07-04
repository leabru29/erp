<?php

namespace Modules\Vendas\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Vendas\Models\Cliente;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [];
    }
}
