<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('nota_fiscal_entradas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('numero');
            $table->string('serie');
            $table->string('chave_acesso')->unique();
            $table->string('modelo')->default('55');
            $table->string('natureza_operacao');
            $table->foreignUuid('fornecedor_id')->constrained('fornecedores');
            $table->date('data_emissao');
            $table->date('data_entrada');
            $table->decimal('valor_produtos', 10, 2)->default(0);
            $table->decimal('valor_frete', 10, 2)->default(0);
            $table->decimal('valor_seguro', 10, 2)->default(0);
            $table->decimal('valor_desconto', 10, 2)->default(0);
            $table->decimal('valor_icms', 10, 2)->default(0);
            $table->decimal('valor_ipi', 10, 2)->default(0);
            $table->decimal('valor_total', 10, 2)->default(0);
            $table->string('status')->default('PENDENTE');
            $table->text('xml_path')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nota_fiscal_entradas');
    }
};