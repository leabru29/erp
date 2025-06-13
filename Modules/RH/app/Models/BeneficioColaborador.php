<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\RH\Database\Factories\BeneficioColaboradorFactory;

class BeneficioColaborador extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): BeneficioColaboradorFactory
    // {
    //     // return BeneficioColaboradorFactory::new();
    // }
}
