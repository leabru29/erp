<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('razao_social');
            $table->string('nome_fantasia');
            $table->string('cnpj', 18)->unique();
            $table->string('inscricao_estadual')->unique();
            $table->string('inscricao_municipal')->unique();
            $table->string('email')->unique();
            $table->string('telefone')->nullable();
            $table->string('celular');
            $table->string('site')->nullable();
            $table->text('observacoes')->nullable();
            $table->string('cep', 9);
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado', 2);
            $table->string('banco');
            $table->string('agencia');
            $table->string('conta');
            $table->string('tipo_conta');
            $table->string('pix');
            $table->string('responsavel');
            $table->boolean('ativo')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fornecedors');
    }
};
