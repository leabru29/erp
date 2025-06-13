<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PontoRegistroFactory extends Factory
{
    protected $model = \Modules\RH\Models\PontoRegistro::class;

    public function definition(): array
    {
        return [
            'colaborador_id' => \Modules\RH\Models\Colaborador::factory(),
            'data' => $this->faker->date(),
            'entrada' => '08:05',
            'saida_almoco' => '12:01',
            'retorno_almoco' => '13:00',
            'saida' => '17:02',
        ];
    }
}

