<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('pedido_vendas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cliente_id');
            $table->uuid('vendedor_id')->nullable();
            $table->uuid('condicao_pagamento_id')->nullable();
            $table->date('data_pedido');
            $table->string('status')->default('aberto');
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('vendedor_id')->references('id')->on('vendedores');
            $table->foreign('condicao_pagamento_id')->references('id')->on('condicoes_pagamento');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedido_vendas');
    }
};