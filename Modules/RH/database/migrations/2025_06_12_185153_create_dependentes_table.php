<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('dependentes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('colaborador_id')->constrained('colaboradores')->onUpdate('cascade');
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('parentesco');
            $table->string('cpf')->nullable();
            $table->boolean('dependente_ir')->default(false);
            $table->boolean('beneficiario')->default(false);
            $table->text('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dependentes');
    }
};
