<?php

namespace Modules\Vendas\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Vendas\Database\Factories\PedidoVendaFactory;

class PedidoVenda extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'pedido_vendas';

    protected $fillable = [
        'cliente_id',
        'vendedor_id',
        'condicao_pagamento_id',
        'data_pedido',
        'status',
        'valor_total',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(Vendedor::class);
    }

    public function itens()
    {
        return $this->hasMany(ItemPedidoVenda::class);
    }

    public function notaFiscal()
    {
        return $this->hasOne(NotaFiscalSaida::class);
    }

    public function condicaoPagamento()
    {
        return $this->belongsTo(CondicaoPagamento::class);
    }

    protected static function newFactory(): PedidoVendaFactory
    {
        return PedidoVendaFactory::new();
    }
}
