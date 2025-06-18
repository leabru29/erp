<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\Cotacao;
use Modules\Compras\Models\Fornecedor;

class CotacaoFactory extends Factory
{
    protected $model = Cotacao::class;

    public function definition(): array
    {
        return [
            'fornecedor_id' => Fornecedor::factory(),
            'numero' => strtoupper($this->faker->bothify('COT-####')),
            'data_emissao' => now(),
            'data_validade' => now()->addDays(15),
            'valor_total' => $this->faker->randomFloat(2, 500, 5000),
            'condicoes_pagamento' => $this->faker->optional()->sentence,
            'observacoes' => $this->faker->optional()->paragraph,
            'status' => 'aberta',
        ];
    }
}

