<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\ItemPedidoCompra;
use Modules\Compras\Models\PedidoCompra;

class ItemPedidoCompraFactory extends Factory
{
    protected $model = ItemPedidoCompra::class;

    public function definition(): array
    {
        $quantidade = $this->faker->numberBetween(1, 10);
        $preco = $this->faker->randomFloat(2, 10, 500);

        return [
            'pedido_compra_id' => PedidoCompra::factory(),
            'descricao' => $this->faker->words(3, true),
            'quantidade' => $quantidade,
            'preco_unitario' => $preco,
            'subtotal' => $quantidade * $preco,
        ];
    }
}

