<?php

namespace Modules\RH\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\RH\Models\Colaborador;

class HorarioTrabalhoFactory extends Factory
{
    protected $model = \Modules\RH\Models\HorarioTrabalho::class;

    public function definition(): array
    {
        return [
            'colaborador_id' => Colaborador::factory(),
            'entrada_manha' => '08:00',
            'saida_manha' => '12:00',
            'entrada_tarde' => '13:00',
            'saida_tarde' => '17:00',
            'dias_semana' => 'seg,ter,qua,qui,sex',
        ];
    }
}

