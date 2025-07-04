<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('nota_fiscal_saidas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pedido_venda_id')->nullable();
            $table->uuid('cliente_id')->nullable();
            $table->uuid('empresa_id')->nullable();
            $table->string('numero', 20)->nullable();
            $table->string('serie', 10)->nullable();
            $table->string('chave_acesso', 50)->nullable();
            $table->date('data_emissao')->nullable();
            $table->date('data_saida')->nullable();
            $table->decimal('valor_total', 15, 2)->default(0);
            $table->decimal('valor_icms', 15, 2)->default(0);
            $table->decimal('valor_pis', 15, 2)->default(0);
            $table->decimal('valor_cofins', 15, 2)->default(0);
            $table->string('status', 20)->default('pendente');
            $table->text('xml')->nullable();
            $table->text('pdf')->nullable();
            $table->timestamps();

            // Foreign keys (opcional, se as tabelas já existirem)
            // $table->foreign('pedido_venda_id')->references('id')->on('pedidos_venda');
            // $table->foreign('cliente_id')->references('id')->on('clientes');
            // $table->foreign('empresa_id')->references('id')->on('empresas');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nota_fiscal_saidas');
    }
};
