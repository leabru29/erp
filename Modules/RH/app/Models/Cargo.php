<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\CargoFactory;

class Cargo extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'departamento_id',
        'nome',
        'descricao',
        'salario_base',
        'ativo',
    ];

    protected $casts = [
        'salario_base' => 'decimal:2',
        'ativo' => 'boolean',
    ];

    protected static function newFactory(): CargoFactory
    {
        return CargoFactory::new();
    }
    
    public function departamento(): BelongsTo
    {
        return $this->belongsTo(Departamento::class);
    }

    public function colaboradores(): HasMany
    {
        return $this->hasMany(Colaborador::class);
    }
}
