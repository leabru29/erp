<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('itens_pedido_venda', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pedido_venda_id');
            $table->uuid('produto_id');
            $table->decimal('quantidade', 10, 2);
            $table->decimal('valor_unitario', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();

            $table->foreign('pedido_venda_id')->references('id')->on('pedidos_venda');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('itens_pedido_venda');
    }
};