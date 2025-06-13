<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\TreinamentoFactory;

class Treinamento extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'titulo',
        'descricao',
        'carga_horaria',
        'data_inicio',
        'data_fim',
        'local',
        'instrutor',
        'ativo',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
        'ativo' => 'boolean',
    ];

    protected static function newFactory(): TreinamentoFactory
    {
        return TreinamentoFactory::new();
    }
}
