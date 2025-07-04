<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('pedido_compras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('numero')->unique();
            $table->foreignUuid('fornecedor_id')->constrained('fornecedores');
            $table->foreignUuid('cliente_id')->constrained('clientes')->onUpdate('cascade');
            $table->date('data_pedido');
            $table->date('data_previsao_entrega')->nullable();
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->string('status')->default('ABERTO');
            $table->text('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedido_compras');
    }
};