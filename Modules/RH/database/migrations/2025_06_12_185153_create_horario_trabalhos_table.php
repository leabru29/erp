<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('horario_trabalhos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('colaborador_id')->constrained('colaboradores')->onUpdate('cascade');
            $table->time('entrada_manha')->nullable();
            $table->time('saida_manha')->nullable();
            $table->time('entrada_tarde')->nullable();
            $table->time('saida_tarde')->nullable();
            $table->string('dias_semana')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horario_trabalhos');
    }
};
