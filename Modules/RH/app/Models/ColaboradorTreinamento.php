<?php

namespace Modules\RH\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\RH\Database\Factories\ColaboradorTreinamentoFactory;

class ColaboradorTreinamento extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): ColaboradorTreinamentoFactory
    // {
    //     // return ColaboradorTreinamentoFactory::new();
    // }
}
