<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\AfastamentoFactory;

class Afastamento extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'colaborador_id',
        'data_inicio',
        'data_fim',
        'motivo',
        'observacoes',
        'tipo_afastamento',
    ];

    protected $casts = [
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    protected static function newFactory(): AfastamentoFactory
    {
        return AfastamentoFactory::new();
    }
}
