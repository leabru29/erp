<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\Cotacao;
use Modules\Compras\Models\ItemCotacao;
use Modules\Estoque\Models\Produto;

class ItemCotacaoFactory extends Factory
{
    protected $model = ItemCotacao::class;

    public function definition(): array
    {
        $quantidade = $this->faker->numberBetween(1, 10);
        $preco = $this->faker->randomFloat(2, 10, 500);

        return [
            'cotacao_id' => Cotacao::factory(),
            'descricao' => $this->faker->words(3, true),
            'quantidade' => $quantidade,
            'preco_unitario' => $preco,
            'subtotal' => $quantidade * $preco,
            'produto_id' => Produto::factory()
        ];
    }
}

