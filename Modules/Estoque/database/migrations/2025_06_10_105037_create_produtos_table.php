<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('codigo_produto')->unique();
            $table->foreignId('categoria_id')->constrained('categorias', 'id');
            $table->string('nome_produto')->unique();
            $table->text('descricao_produto');
            $table->decimal('preco');
            $table->string('sku', 64)->nullable()->comment('É o código ligado à logística de armazém, e deve conter até 64 caracteres.');
            $table->string('ncm', 8)->nullable()->comment('Significa Nomenclatura Comum do Mercosul, e deve conter 8 números.');
            $table->string('cest', 7)->nullable()->comment('Significa Código Especificador da Substituição Tributária, e deve conter 7 números.');
            $table->string('upc', 12)->nullable()->comment('Significa Código universal de produto, e deve conter 12 números.');
            $table->string('ean', 14)->nullable()->comment('Significa Número de artigo europeu, e deve conter 13 números, mas pode ter 8 ou 14 números.');
            $table->integer('quantidade');
            $table->foreignId('unidade_medida_id')->constrained('unidade_medidas', 'id');
            $table->decimal('comprimento');
            $table->decimal('altura');
            $table->decimal('largura');
            $table->decimal('peso');
            $table->enum('unidade_peso', ['quilograma', 'grama']);
            $table->string('imagem_principal')->default('produtos/imagem_principal.jpg');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
