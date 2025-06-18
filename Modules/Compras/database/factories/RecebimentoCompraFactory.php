<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\PedidoCompra;
use Modules\Compras\Models\RecebimentoCompra;

class RecebimentoCompraFactory extends Factory
{
    protected $model = RecebimentoCompra::class;

    public function definition(): array
    {
        return [
            'pedido_compra_id' => PedidoCompra::factory(),
            'nota_fiscal_entrada_id' => null,
            'data_recebimento' => $this->faker->date(),
            'responsavel_recebimento' => $this->faker->name(),
            'observacoes' => $this->faker->sentence(),
            'status' => 'PENDENTE',
        ];
    }
}