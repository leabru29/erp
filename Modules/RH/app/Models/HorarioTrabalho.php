<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\HorarioTrabalhoFactory;

class HorarioTrabalho extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'colaborador_id',
        'entrada_manha',
        'saida_manha',
        'entrada_tarde',
        'saida_tarde',
        'dias_semana',
    ];

    protected $casts = [
        'entrada_manha' => 'datetime:H:i',
        'saida_manha' => 'datetime:H:i',
        'entrada_tarde' => 'datetime:H:i',
        'saida_tarde' => 'datetime:H:i',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    protected static function newFactory(): HorarioTrabalhoFactory
    {
        return HorarioTrabalhoFactory::new();
    }
}
