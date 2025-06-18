<?php

namespace Modules\Compras\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Compras\Database\Factories\CotacaoFactory;

class Cotacao extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'fornecedor_id',
        'pedido_compra_id',
        'numero',
        'data_emissao',
        'data_validade',
        'valor_total',
        'condicoes_pagamento',
        'observacoes',
        'status',
    ];

    protected $casts = [
        'data_emissao' => 'date',
        'data_validade' => 'date',
        'valor_total' => 'decimal:2',
    ];

    protected static function newFactory(): CotacaoFactory
    {
        return CotacaoFactory::new();
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function pedidoCompra()
    {
        return $this->belongsTo(PedidoCompra::class);
    }
}
