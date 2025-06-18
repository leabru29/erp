<?php

namespace Modules\Compras\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Compras\Database\Factories\ItemNotaFiscalEntradaFactory;
use Modules\Estoque\Models\Produto;

class ItemNotaFiscalEntrada extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'nota_fiscal_entrada_id',
        'produto_id',
        'item_pedido_compra_id',
        'descricao',
        'quantidade',
        'valor_unitario',
        'valor_total',
        'desconto',
        'icms',
        'ipi',
    ];

    protected static function newFactory(): ItemNotaFiscalEntradaFactory
    {
        return ItemNotaFiscalEntradaFactory::new();
    }

    public function notaFiscalEntrada()
    {
        return $this->belongsTo(NotaFiscalEntrada::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function itens()
    {
        return $this->hasMany(ItemNotaFiscalEntrada::class);
    }
}