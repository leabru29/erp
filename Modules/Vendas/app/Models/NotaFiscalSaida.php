<?php

namespace Modules\Vendas\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Vendas\Database\Factories\NotaFiscalSaidaFactory;

class NotaFiscalSaida extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'nota_fiscal_saidas';

    protected $fillable = [
        'pedido_venda_id',
        'cliente_id',
        'empresa_id',
        'numero',
        'serie',
        'chave_acesso',
        'data_emissao',
        'data_saida',
        'valor_total',
        'valor_icms',
        'valor_pis',
        'valor_cofins',
        'status',
        'xml',
        'pdf',
    ];

    protected static function newFactory(): NotaFiscalSaidaFactory
    {
        return NotaFiscalSaidaFactory::new();
    }

    public function pedidoVenda(): BelongsTo
    {
        return $this->belongsTo(PedidoVenda::class, 'pedido_venda_id');
    }
}