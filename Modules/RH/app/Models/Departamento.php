<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\DepartamentoFactory;

class Departamento extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'nome',
        'descricao',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
    ];

    protected static function newFactory(): DepartamentoFactory
    {
        return DepartamentoFactory::new();
    }

    public function cargos(): HasMany
    {
        return $this->hasMany(Cargo::class);
    }
}
