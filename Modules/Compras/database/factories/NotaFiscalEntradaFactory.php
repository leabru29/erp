<?php

namespace Modules\Compras\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Compras\Models\Fornecedor;
use Modules\Compras\Models\NotaFiscalEntrada;
use Illuminate\Support\Str;

class NotaFiscalEntradaFactory extends Factory
{
    protected $model = NotaFiscalEntrada::class;

    public function definition(): array
    {
        return [
            'numero' => $this->faker->numerify('########'),
            'serie' => $this->faker->numerify('###'),
            'chave_acesso' => Str::random(44),
            'modelo' => '55',
            'natureza_operacao' => 'Compra para revenda',
            'fornecedor_id' => Fornecedor::factory(),
            'data_emissao' => $this->faker->date(),
            'data_entrada' => $this->faker->date(),
            'valor_produtos' => $this->faker->randomFloat(2, 100, 1000),
            'valor_frete' => 0,
            'valor_seguro' => 0,
            'valor_desconto' => 0,
            'valor_icms' => 0,
            'valor_ipi' => 0,
            'valor_total' => 1000,
            'status' => 'PENDENTE',
            'xml_path' => null,
            'observacoes' => $this->faker->sentence(),
        ];
    }
}