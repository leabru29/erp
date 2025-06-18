<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\ContaPagar;
use Modules\Compras\Models\Fornecedor;

class ContaPagarFactory extends Factory
{
    protected $model = ContaPagar::class;

    public function definition(): array
    {
        return [
            'fornecedor_id' => Fornecedor::factory(),
            'descricao' => $this->faker->sentence,
            'valor_total' => $this->faker->randomFloat(2, 100, 5000),
            'data_emissao' => now(),
            'data_vencimento' => now()->addDays(30),
            'forma_pagamento' => $this->faker->randomElement(['boleto', 'pix', 'transferencia']),
            'observacoes' => $this->faker->optional()->paragraph,
            'pago' => false,
        ];
    }
}

