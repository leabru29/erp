<?php

namespace Modules\Vendas\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Vendas\Database\Factories\ClienteFactory;

class Cliente extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'clientes';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cpf_cnpj',
    ];

    protected static function newFactory(): ClienteFactory
    {
        return ClienteFactory::new();
    }
}