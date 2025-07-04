<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('folha_pagamentos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('colaborador_id')->constrained('colaboradores')->onUpdate('cascade');
            $table->string('referencia');
            $table->decimal('salario_base', 10, 2);
            $table->decimal('adicionais', 10, 2)->default(0);
            $table->decimal('descontos', 10, 2)->default(0);
            $table->decimal('inss', 10, 2)->default(0);
            $table->decimal('irrf', 10, 2)->default(0);
            $table->decimal('valor_liquido', 10, 2);
            $table->date('data_pagamento')->nullable();
            $table->string('status')->default('pendente');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('folha_pagamentos');
    }
};
