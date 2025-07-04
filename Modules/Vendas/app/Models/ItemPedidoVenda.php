<?php

namespace Modules\Vendas\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Vendas\Database\Factories\ItemPedidoVendaFactory;

class ItemPedidoVenda extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'itens_pedido_venda';

    protected $fillable = [
            'pedido_venda_id',
            'produto_id',
            'quantidade',
            'valor_unitario',
            'subtotal',
        ];

    public function pedido()
    {
        return $this->belongsTo(PedidoVenda::class, 'pedido_venda_id');
    }

    protected static function newFactory(): ItemPedidoVendaFactory
    {
        return ItemPedidoVendaFactory::new();
    }
}
