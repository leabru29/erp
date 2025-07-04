<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('ferias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('colaborador_id')->constrained('colaboradores')->onUpdate('cascade');
            $table->date('inicio');
            $table->date('fim');
            $table->integer('dias');
            $table->text('observacoes')->nullable();
            $table->boolean('aprovado')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ferias');
    }
};
