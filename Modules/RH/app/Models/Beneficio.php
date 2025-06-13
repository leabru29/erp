<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\BeneficioFactory;

class Beneficio extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'nome',
        'descricao',
        'tipo',
        'valor',
        'ativo',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'ativo' => 'boolean',
    ];

    protected static function newFactory(): BeneficioFactory
    {
        return BeneficioFactory::new();
    }
}
