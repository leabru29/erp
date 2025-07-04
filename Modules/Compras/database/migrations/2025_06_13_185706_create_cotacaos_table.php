<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('cotacoes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('fornecedor_id')->constrained('fornecedores')->onUpdate('cascade');
            $table->foreignUuid('pedido_compra_id')->constrained('pedido_compras')->onUpdate('cascade');
            $table->string('numero')->unique();
            $table->date('data_emissao');
            $table->date('data_validade')->nullable();
            $table->decimal('valor_total', 12, 2);
            $table->text('condicoes_pagamento')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('status')->default('aberta');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cotacoes');
    }
};
