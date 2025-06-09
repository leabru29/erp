<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha');
            $table->string('telefone')->nullable();
            $table->string('cpf')->unique()->nullable();
            $table->string('cargo')->nullable();
            $table->enum('nivel_acesso', ['admin', 'gerente', 'usuario'])->default('usuario');
            $table->boolean('ativo')->default(true);
            $table->timestamp('ultimo_login')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
