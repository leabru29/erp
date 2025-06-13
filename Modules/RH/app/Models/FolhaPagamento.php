<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\FolhaPagamentoFactory;

class FolhaPagamento extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'colaborador_id',
        'referencia',
        'salario_base',
        'adicionais',
        'descontos',
        'inss',
        'irrf',
        'valor_liquido',
        'data_pagamento',
        'status',
    ];

    protected $casts = [
        'salario_base' => 'decimal:2',
        'adicionais' => 'decimal:2',
        'descontos' => 'decimal:2',
        'inss' => 'decimal:2',
        'irrf' => 'decimal:2',
        'valor_liquido' => 'decimal:2',
        'data_pagamento' => 'date',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    protected static function newFactory(): FolhaPagamentoFactory
    {
        return FolhaPagamentoFactory::new();
    }
}
