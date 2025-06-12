<?php

namespace Modules\Estoque\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Estoque\Models\Categoria;
use Modules\Estoque\Models\Fornecedor;

class CategoriaFactory extends Factory
{
    protected $model = Categoria::class;

    public function definition(): array
    {
        $fornecedor = Fornecedor::inRandomOrder()->first();
        return [
            'fornecedor_id' => $fornecedor->id, 
            'nome_categoria' => fake()->firstName(),
            'descricao' => fake()->text()
        ];
    }
}

