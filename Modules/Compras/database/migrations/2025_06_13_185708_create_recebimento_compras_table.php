<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('recebimento_compras', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('pedido_compra_id')->constrained('pedido_compras');
            $table->foreignUuid('nota_fiscal_entrada_id')->nullable()->constrained('nota_fiscal_entradas');
            $table->date('data_recebimento');
            $table->string('responsavel_recebimento');
            $table->text('observacoes')->nullable();
            $table->string('status')->default('PENDENTE');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('recebimento_compras');
    }
};