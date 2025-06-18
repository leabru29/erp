<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('item_pedido_compras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pedido_compra_id');
            $table->uuid('produto_id')->nullable();
            $table->string('descricao');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 12, 2);
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('pedido_compra_id')->references('id')->on('pedido_compras')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_pedido_compras');
    }
};
