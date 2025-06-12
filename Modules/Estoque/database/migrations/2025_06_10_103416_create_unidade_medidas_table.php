<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unidade_medidas', function (Blueprint $table) {
            $table->id();
            $table->string('nome_unidade', 20);
            $table->string('sigla', 2);           
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidade_medidas');
    }
};
