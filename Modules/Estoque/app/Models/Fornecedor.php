<?php

namespace Modules\Estoque\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Estoque\Database\Factories\FornecedorFactory;

class Fornecedor extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'fornecedores';

    protected $fillable = [
        'razao_social',
        'nome_fantasia',
        'cnpj',
        'inscricao_estadual',
        'inscricao_municipal',
        'email',
        'telefone',
        'celular',
        'site',
        'observacoes',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'banco',
        'agencia',
        'conta',
        'tipo_conta',
        'pix',
        'responsavel',
        'ativo',
    ];

    protected static function newFactory(): FornecedorFactory
    {
        return FornecedorFactory::new();
    }

    public function categorias(): HasMany
    {
        return $this->hasMany(Categoria::class);
    }
}
