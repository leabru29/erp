<?php

namespace Modules\Usuarios\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Modules\Usuarios\Http\Requests\StoreUsuarioRequest;
use Modules\Usuarios\Http\Requests\UpdateUsuarioRequest;
use Modules\Usuarios\Models\Usuario;
use Yajra\DataTables\Facades\DataTables;

class UsuariosController extends Controller
{
    public function viewIndex()
    {
        return view('usuarios::index');
    }

    public function index(Request $request): JsonResponse
    {
        if ($request->ajax()) {
            $query = Usuario::select(['id', 'nome', 'email', 'nivel_acesso', 'ativo']);

            return DataTables::of($query)
                                ->addColumn('acoes', function ($usuario) {
                                    return $usuario->id;
                                })
                                ->make(true);
        }

        return response()->json(['message' => 'Requisição inválida'], 400);
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
        $usuario->update($dados);
        return response()->json(['message' => 'Usuário atualizado com sucesso!']);
    }

    public function destroy(Usuario $usuario): JsonResponse
    {
        $usuario->delete();
        return response()->json(['message' => 'Usuário deletado com sucesso!']);
    }
}