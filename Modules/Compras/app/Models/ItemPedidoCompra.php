<?php

namespace Modules\Compras\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Compras\Database\Factories\ItemPedidoCompraFactory;
use Modules\Estoque\Models\Produto;

class ItemPedidoCompra extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'pedido_compra_id',
        'produto_id',
        'descricao',
        'quantidade',
        'preco_unitario',
        'subtotal',
    ];

    protected $casts = [
        'preco_unitario' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    protected static function newFactory(): ItemPedidoCompraFactory
    {
        return ItemPedidoCompraFactory::new();
    }

    public function pedidoCompra()
    {
        return $this->belongsTo(PedidoCompra::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
