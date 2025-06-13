<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\PontoRegistroFactory;

class PontoRegistro extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'colaborador_id',
        'data',
        'entrada',
        'saida_almoco',
        'retorno_almoco',
        'saida',
    ];

    protected $casts = [
        'data' => 'date',
        'entrada' => 'datetime:H:i',
        'saida_almoco' => 'datetime:H:i',
        'retorno_almoco' => 'datetime:H:i',
        'saida' => 'datetime:H:i',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    protected static function newFactory(): PontoRegistroFactory
    {
        return PontoRegistroFactory::new();
    }
}
