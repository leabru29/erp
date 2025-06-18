<?php

namespace Modules\Compras\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Compras\Database\Factories\RecebimentoCompraFactory;

class RecebimentoCompra extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $fillable = [
        'pedido_compra_id',
        'nota_fiscal_entrada_id',
        'data_recebimento',
        'responsavel_recebimento',
        'observacoes',
        'status',
    ];

    protected static function newFactory(): RecebimentoCompraFactory
    {
        return RecebimentoCompraFactory::new();
    }

    public function pedidoCompra()
    {
        return $this->belongsTo(PedidoCompra::class);
    }

    public function notaFiscalEntrada()
    {
        return $this->belongsTo(NotaFiscalEntrada::class);
    }
}