<?php

namespace Modules\Estoque\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Estoque\Database\Factories\UnidadeMedidaFactory;

class UnidadeMedida extends Model
{
    use HasFactory;

    protected $table = 'unidade_medidas';

    protected $fillable = [
        'nome_unidade',
        'sigla'
    ];

    protected static function newFactory(): UnidadeMedidaFactory
    {
        return UnidadeMedidaFactory::new();
    }

    public function produtos(): HasMany
    {
        return $this->hasMany(Produto::class);
    }
}
