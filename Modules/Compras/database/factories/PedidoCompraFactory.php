<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\Fornecedor;
use Modules\Usuarios\Models\Usuario;

class PedidoCompraFactory extends Factory
{
    protected $model = \Modules\Compras\Models\PedidoCompra::class;

    public function definition(): array
    {
        return [
            'numero' => $this->faker->unique()->numerify('PC#####'),
            'fornecedor_id' => Fornecedor::factory(),
            'data_pedido' => now(),
            'data_previsao_entrega' => now()->addDays(7),
            'valor_total' => 0,
            'status' => 'ABERTO',
            'observacoes' => $this->faker->sentence(),
            'usuario_id' => Usuario::factory(),
        ];
    }
}