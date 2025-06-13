<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

use Modules\RH\Database\Factories\ColaboradorFactory;

class Colaborador extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'cargo_id',
        'departamento_id',
        'nome_completo',
        'cpf',
        'rg',
        'data_nascimento',
        'genero',
        'estado_civil',
        'nacionalidade',
        'email',
        'telefone',
        'celular',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'matricula',
        'data_admissao',
        'data_demissao',
        'tipo_contrato',
        'salario',
        'ativo',
        'banco',
        'agencia',
        'conta',
        'tipo_conta',
        'pix'
    ];

    protected $casts = [
        'data_nascimento' => 'date',
        'data_admissao' => 'date',
        'data_demissao' => 'date',
        'salario' => 'decimal:2',
        'ativo' => 'boolean',
    ];

    protected static function newFactory(): ColaboradorFactory
    {
        return ColaboradorFactory::new();
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }
}
