<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('beneficio_colaboradores', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('colaborador_id')
                ->constrained('colaboradores')
                ->onUpdate('cascade');
            $table->foreignUuid('beneficio_id')
                ->constrained('beneficios')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beneficio_colaboradores');
    }
};
