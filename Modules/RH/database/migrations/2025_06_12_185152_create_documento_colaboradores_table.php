<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documento_colaboradores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('colaborador_id');
            $table->string('tipo_documento');
            $table->string('numero');
            $table->date('data_emissao')->nullable();
            $table->string('orgao_emissor')->nullable();
            $table->string('uf_emissor', 2)->nullable();
            $table->date('validade')->nullable();
            $table->string('arquivo')->nullable();
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
        Schema::dropIfExists('documento_colaboradores');
    }
};
