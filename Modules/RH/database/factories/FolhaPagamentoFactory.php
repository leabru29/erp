<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Colaborador;
use Modules\RH\Models\FolhaPagamento;

class FolhaPagamentoFactory extends Factory
{
     protected $model = FolhaPagamento::class;

    public function definition(): array
    {
        $salarioBase = $this->faker->randomFloat(2, 1000, 5000);
        $adicionais = $this->faker->randomFloat(2, 0, 500);
        $descontos = $this->faker->randomFloat(2, 0, 300);
        $inss = $salarioBase * 0.11;
        $irrf = $salarioBase * 0.075;
        $liquido = $salarioBase + $adicionais - $descontos - $inss - $irrf;

        return [
            'colaborador_id' => Colaborador::factory(),
            'referencia' => $this->faker->date('m/Y'),
            'salario_base' => $salarioBase,
            'adicionais' => $adicionais,
            'descontos' => $descontos,
            'inss' => $inss,
            'irrf' => $irrf,
            'valor_liquido' => $liquido,
            'data_pagamento' => $this->faker->optional()->date(),
            'status' => $this->faker->randomElement(['pendente', 'pago', 'atrasado']),
        ];
    }
}

