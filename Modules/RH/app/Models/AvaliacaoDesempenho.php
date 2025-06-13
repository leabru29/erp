<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\AvaliacaoDesempenhoFactory;

class AvaliacaoDesempenho extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $fillable = [
        'colaborador_id',
        'data_avaliacao',
        'nota',
        'comentarios',
        'avaliador',
    ];

    protected $casts = [
        'data_avaliacao' => 'date',
        'nota' => 'integer',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }
    
    protected static function newFactory(): AvaliacaoDesempenhoFactory
    {
        return AvaliacaoDesempenhoFactory::new();
    }
}
