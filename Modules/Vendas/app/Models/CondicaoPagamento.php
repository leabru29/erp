<?php

namespace Modules\Vendas\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Vendas\Database\Factories\CondicaoPagamentoFactory;

class CondicaoPagamento extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'condicoes_pagamento';

    protected $fillable = [];

    protected static function newFactory(): CondicaoPagamentoFactory
    {
        return CondicaoPagamentoFactory::new();
    }
}
