<?php

namespace Modules\Compras\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Compras\Database\Factories\ContaPagarFactory;

class ContaPagar extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $table = 'contas_pagar';

    protected $fillable = [
        'fornecedor_id',
        'pedido_compra_id',
        'descricao',
        'valor_total',
        'data_emissao',
        'data_vencimento',
        'data_pagamento',
        'valor_pago',
        'forma_pagamento',
        'observacoes',
        'pago',
    ];

    protected $casts = [
        'valor_total' => 'decimal:2',
        'valor_pago' => 'decimal:2',
        'data_emissao' => 'date',
        'data_vencimento' => 'date',
        'data_pagamento' => 'date',
        'pago' => 'boolean',
    ];

    protected static function newFactory(): ContaPagarFactory
    {
        return ContaPagarFactory::new();
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
