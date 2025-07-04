<?php

namespace Modules\Vendas\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Vendas\Database\Factories\VendedorFactory;

class Vendedor extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'vendedores';

    protected $fillable = [];

    protected static function newFactory(): VendedorFactory
    {
        return VendedorFactory::new();
    }
}
