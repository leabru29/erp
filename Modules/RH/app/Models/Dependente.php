<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\DependenteFactory;

class Dependente extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'colaborador_id',
        'nome',
        'data_nascimento',
        'parentesco',
        'cpf',
        'dependente_ir',
        'beneficiario',
        'observacoes',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'dependente_ir' => 'boolean',
        'beneficiario' => 'boolean',
    ];

    public function colaborador()
    {
        return $this->belongsTo(Colaborador::class);
    }

    protected static function newFactory(): DependenteFactory
    {
        return DependenteFactory::new();
    }
}
