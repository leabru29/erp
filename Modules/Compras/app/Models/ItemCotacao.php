<?php

namespace Modules\Compras\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Compras\Database\Factories\ItemCotacaoFactory;
use Modules\Estoque\Models\Produto;

class ItemCotacao extends Model
{
   use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'cotacao_id',
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

    protected static function newFactory(): ItemCotacaoFactory
    {
        return ItemCotacaoFactory::new();
    }

    public function cotacao()
    {
        return $this->belongsTo(Cotacao::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
