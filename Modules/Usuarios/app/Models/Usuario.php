<?php

namespace Modules\Usuarios\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Usuarios\Database\Factories\UsuarioFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'email', 
        'senha', 
        'telefone', 
        'cpf',
        'cargo', 
        'nivel_acesso', 
        'ativo', 
        'ultimo_login'
    ];

    protected $hidden = ['senha', 'remember_token'];

    protected static function newFactory(): UsuarioFactory
    {
        return UsuarioFactory::new();
    }
}
