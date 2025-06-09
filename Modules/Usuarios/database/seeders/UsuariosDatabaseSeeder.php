<?php

namespace Modules\Usuarios\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Usuarios\Models\Usuario;

class UsuariosDatabaseSeeder extends Seeder
{
    public function run()
    {
        Usuario::factory()->count(10)->create();
    }

}
