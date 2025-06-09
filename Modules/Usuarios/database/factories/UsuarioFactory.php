<?php

namespace Modules\Usuarios\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Usuarios\Models\Usuario;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        return [
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->email,
            'senha' => bcrypt('password'),
            'telefone' => $this->faker->cellphoneNumber,
            'cpf' => $this->faker->cpf(),
            'cargo' => 'Funcionário',
            'nivel_acesso' => 'usuario',
            'ativo' => 1,
            'ultimo_login' => now(),
        ];
    }
}

