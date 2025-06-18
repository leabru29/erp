<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contas_pagar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('fornecedor_id');
            $table->uuid('pedido_compra_id')->nullable();
            $table->string('descricao');
            $table->decimal('valor_total', 12, 2);
            $table->date('data_emissao');
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->decimal('valor_pago', 12, 2)->nullable();
            $table->string('forma_pagamento')->nullable();
            $table->text('observacoes')->nullable();
            $table->boolean('pago')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
            $table->foreign('pedido_compra_id')->references('id')->on('pedidos_compra');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contas_pagar');
    }
};
