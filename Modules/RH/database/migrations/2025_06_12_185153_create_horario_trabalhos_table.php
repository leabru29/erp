<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('horario_trabalhos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('colaborador_id');
            $table->time('entrada_manha')->nullable();
            $table->time('saida_manha')->nullable();
            $table->time('entrada_tarde')->nullable();
            $table->time('saida_tarde')->nullable();
            $table->string('dias_semana')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('colaborador_id')
                  ->references('id')
                  ->on('colaboradors')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horario_trabalhos');
    }
};
