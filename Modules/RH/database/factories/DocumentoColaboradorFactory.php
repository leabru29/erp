<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Colaborador;
use Modules\RH\Models\DocumentoColaborador;

class DocumentoColaboradorFactory extends Factory
{
    protected $model = DocumentoColaborador::class;

    public function definition(): array
    {
        return [
            'colaborador_id' => Colaborador::factory(),
            'tipo_documento' => $this->faker->randomElement(['RG', 'CPF', 'CNH', 'CTPS']),
            'numero' => $this->faker->numerify('########'),
            'data_emissao' => $this->faker->optional()->date(),
            'orgao_emissor' => $this->faker->optional()->company,
            'uf_emissor' => $this->faker->stateAbbr,
            'validade' => $this->faker->optional()->date(),
            'arquivo' => $this->faker->optional()->word() . '.pdf',
        ];
    }
}

