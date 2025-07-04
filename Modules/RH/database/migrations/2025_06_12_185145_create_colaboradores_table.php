<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('colaboradores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('cargo_id')->constrained('cargos')->onUpdate('cascade');
            $table->foreignUuid('departamento_id')->constrained('departamentos')->onUpdate('cascade');

            // Dados pessoais
            $table->string('nome_completo');
            $table->string('cpf')->unique();
            $table->string('rg')->nullable();
            $table->date('data_nascimento');
            $table->enum('genero', ['masculino', 'feminino', 'outro'])->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('nacionalidade')->nullable();

            // Contato
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();

            // Endereço
            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();

            // Dados profissionais
            $table->string('matricula')->unique();
            $table->date('data_admissao');
            $table->date('data_demissao')->nullable();
            $table->enum('tipo_contrato', ['CLT', 'PJ', 'temporario', 'estagio']);
            $table->decimal('salario', 10, 2)->default(0);
            $table->boolean('ativo')->default(true);

            // Dados bancários
            $table->string('banco')->nullable();
            $table->string('agencia')->nullable();
            $table->string('conta')->nullable();
            $table->enum('tipo_conta', ['conta_corrente', 'conta_poupanca', 'salario', 'outros'])->nullable();
            $table->string('pix')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('colaboradors');
    }
};
