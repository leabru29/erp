<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('itens_cotacoes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('cotacao_id');
            $table->uuid('produto_id')->nullable();
            $table->string('descricao');
            $table->integer('quantidade');
            $table->decimal('preco_unitario', 12, 2);
            $table->decimal('subtotal', 12, 2);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('cotacao_id')->references('id')->on('cotacoes')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_cotacaos');
    }
};
