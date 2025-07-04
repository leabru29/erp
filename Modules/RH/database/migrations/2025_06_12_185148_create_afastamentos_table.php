<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('afastamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('colaborador_id')->constrained('colaboradores')->onUpdate('cascade');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->string('motivo');
            $table->text('observacoes')->nullable();
            $table->string('tipo_afastamento')->default('médico');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('afastamentos');
    }
};