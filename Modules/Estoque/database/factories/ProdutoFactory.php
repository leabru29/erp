<?php

namespace Modules\Estoque\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Estoque\Models\Categoria;
use Modules\Estoque\Models\Produto;
use Illuminate\Support\Str;
use Modules\Estoque\Enums\UnidadePeso;
use Modules\Estoque\Models\UnidadeMedida;

class ProdutoFactory extends Factory
{
    protected $model = Produto::class;

    public function definition(): array
    {
        $categoria = Categoria::inRandomOrder()->first();
        $unidadeMedida = UnidadeMedida::inRandomOrder()->first();
        return [
            'codigo_produto' => rand(1000, 9999),
            'categoria_id' => $categoria->id,
            'nome_produto' => fake()->name(),
            'descricao_produto' => fake()->text(),
            'preco' => fake()->randomDigit(),
            'sku' => Str::random(64),
            'ncm' => Str::random(8),
            'cest' => Str::random(7),
            'upc' => Str::random(12),
            'sku' => Str::random(13),
            'quantidade' => rand(1, 5),
            'unidade_medida_id' => $unidadeMedida->id,
            'comprimento' => fake()->randomDigit(),
            'altura' => fake()->randomDigit(),
            'largura' => fake()->randomDigit(),
            'peso' => fake()->randomDigit(),
            'unidade_peso' => fake()->randomElement(UnidadePeso::cases())->value,
        ];
    }
}

