<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('contas_pagar', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('fornecedor_id')->constrained('fornecedores')->onUpdate('cascade');
            $table->foreignUuid('pedido_compra_id')->constrained('pedido_compras')->onUpdate('cascade');
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
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contas_pagar');
    }
};
