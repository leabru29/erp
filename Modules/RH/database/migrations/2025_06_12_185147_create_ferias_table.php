<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ferias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('colaborador_id');
            $table->date('inicio');
            $table->date('fim');
            $table->integer('dias');
            $table->text('observacoes')->nullable();
            $table->boolean('aprovado')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('colaborador_id')
                  ->references('id')
                  ->on('colaboradors')
                  ->onDelete('cascade');
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('ferias');
    }
};
