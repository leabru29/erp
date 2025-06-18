<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('item_nota_fiscal_entradas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('nota_fiscal_entrada_id')->constrained('nota_fiscal_entradas');
            $table->foreignUuid('produto_id')->constrained('produtos');
            $table->foreignUuid('item_pedido_compra_id')->nullable()->constrained('item_pedido_compras');
            $table->string('descricao');
            $table->decimal('quantidade', 10, 2);
            $table->decimal('valor_unitario', 10, 4);
            $table->decimal('valor_total', 10, 2);
            $table->decimal('desconto', 10, 2)->default(0);
            $table->decimal('icms', 10, 2)->default(0);
            $table->decimal('ipi', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_nota_fiscal_entradas');
    }
};