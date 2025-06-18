<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\ItemNotaFiscalEntrada;
use Modules\Estoque\Models\Produto;

class ItemNotaFiscalEntradaFactory extends Factory
{
    protected $model = ItemNotaFiscalEntrada::class;

    public function definition(): array
    {
        return [
            'nota_fiscal_entrada_id' => ItemNotaFiscalEntrada::factory(),
            'produto_id' => Produto::factory(),
            'item_pedido_compra_id' => null,
            'descricao' => $this->faker->words(3, true),
            'quantidade' => $this->faker->randomFloat(2, 1, 10),
            'valor_unitario' => $this->faker->randomFloat(4, 10, 500),
            'valor_total' => 0,
            'desconto' => 0,
            'icms' => 0,
            'ipi' => 0,
        ];
    }

}