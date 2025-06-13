<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\RH\Database\Factories\DocumentoColaboradorFactory;

class DocumentoColaborador extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'documento_colaboradores';

    protected $fillable = [
        'colaborador_id',
        'tipo_documento',
        'numero',
        'data_emissao',
        'orgao_emissor',
        'uf_emissor',
        'validade',
        'arquivo',
    ];

    protected $casts = [
        'data_emissao' => 'date',
        'validade' => 'date',
    ];

    public function colaborador(): BelongsTo
    {
        return $this->belongsTo(Colaborador::class);
    }

    protected static function newFactory(): DocumentoColaboradorFactory
    {
        return DocumentoColaboradorFactory::new();
    }
}
