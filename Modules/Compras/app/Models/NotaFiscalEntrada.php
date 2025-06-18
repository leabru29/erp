<?php

namespace Modules\Compras\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Compras\Database\Factories\NotaFiscalEntradaFactory;

class NotaFiscalEntrada extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;
    protected $table = 'nota_fiscal_entradas';
    protected $fillable = [
        'numero',
        'serie',
        'chave_acesso',
        'modelo',
        'natureza_operacao',
        'fornecedor_id',
        'data_emissao',
        'data_entrada',
        'valor_produtos',
        'valor_frete',
        'valor_seguro',
        'valor_desconto',
        'valor_icms',
        'valor_ipi',
        'valor_total',
        'status',
        'xml_path',
        'observacoes',
    ];

    protected static function newFactory(): NotaFiscalEntradaFactory
    {
        return NotaFiscalEntradaFactory::new();
    }

    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function itens()
    {
        return $this->hasMany(ItemPedidoCompra::class);
    }
}