<?php

namespace Modules\Usuarios\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Modules\Usuarios\Http\Requests\StoreUsuarioRequest;
use Modules\Usuarios\Http\Requests\UpdateUsuarioRequest;
use Modules\Usuarios\Models\Usuario;

class UsuariosController extends Controller
{
    public function index(): JsonResponse
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    public function store(StoreUsuarioRequest $request): JsonResponse
    {
        $dados = $request->validated();
        $dados['senha'] = Hash::make($dados['senha']);
        $dados['ultimo_login'] = now();
        Usuario::create($dados);
        return response()->json(['message' => 'Usuário cadastrado com sucesso!'], 201);
    }

    public function show(Usuario $usuario): JsonResponse
    {
        return response()->json($usuario);
    }

    public function update(UpdateUsuarioRequest $request, Usuario $usuario): JsonResponse
    {
        $dados = $request->validated();
        $dados['senha'] = Hash::make($dados['senha']);
        $usuario->update($dados);
        return response()->json(['message' => 'Usuário atualizado com sucesso!']);
    }

    public function destroy(Usuario $usuario): JsonResponse
    {
        $usuario->delete();
        return response()->json(['message' => 'Usuário deletado com sucesso!']);
    }
}
