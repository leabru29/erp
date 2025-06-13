<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\FeriasFactory;

class Ferias extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'colaborador_id',
        'inicio',
        'fim',
        'dias',
        'observacoes',
        'aprovado',
    ];

    protected $casts = [
        'inicio' => 'date',
        'fim' => 'date',
        'aprovado' => 'boolean',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    protected static function newFactory(): FeriasFactory
    {
        return FeriasFactory::new();
    }
}
