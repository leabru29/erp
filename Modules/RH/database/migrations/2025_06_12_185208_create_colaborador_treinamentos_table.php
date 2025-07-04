<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('colaborador_treinamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('colaborador_id')
                ->constrained('colaboradores')
                ->onUpdate('cascade');
            $table->foreignUuid('treinamento_id')
                ->constrained('treinamentos')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('colaborador_treinamentos');
    }
};
