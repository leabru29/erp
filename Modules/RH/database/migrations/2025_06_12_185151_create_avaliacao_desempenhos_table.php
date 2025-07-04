<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('avaliacao_desempenhos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('colaborador_id')->constrained('colaboradores')->onDelete('cascade');
            $table->date('data_avaliacao');
            $table->integer('nota')->unsigned();
            $table->text('comentarios')->nullable();
            $table->string('avaliador')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('avaliacao_desempenhos');
    }
};
