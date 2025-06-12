<?php

namespace Modules\Estoque\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Estoque\Database\Factories\ProdutoFactory;
use Modules\Estoque\Enums\UnidadePeso;

class Produto extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'produtos';

    protected $fillable = [
        'categoria_id',
        'codigo_produto',
        'nome_produto',
        'descricao_produto',
        'preco',
        'sku',
        'ncm',
        'cest',
        'upc',
        'ean',
        'quantidade',
        'unidade_medida_id',
        'comprimento',
        'altura',
        'largura',
        'peso',
        'unidade_peso',
        'imagem_principal',
    ];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }

    protected static function newFactory(): ProdutoFactory
    {
        return ProdutoFactory::new();
    }

    public function unidadeMedida(): BelongsTo
    {
        return $this->belongsTo(UnidadeMedida::class);
    }

    protected $casts = [
        'unidade_peso' => UnidadePeso::class,
    ];
}
