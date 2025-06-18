<?php

namespace Modules\Compras\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Compras\Database\Factories\PedidoCompraFactory;
use Modules\Usuarios\Models\Usuario;

class PedidoCompra extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'numero',
        'fornecedor_id',
        'data_pedido',
        'data_previsao_entrega',
        'valor_total',
        'status',
        'observacoes',
        'usuario_id',
    ];

    protected static function newFactory(): PedidoCompraFactory
    {
        return PedidoCompraFactory::new();
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function itens()
    {
        return $this->hasMany(ItemPedidoCompra::class);
    }
}