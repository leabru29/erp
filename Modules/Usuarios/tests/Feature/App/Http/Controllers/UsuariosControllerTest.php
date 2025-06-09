<?php

namespace Modules\Usuarios\Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Usuarios\Models\Usuario;
use Tests\TestCase;

class UsuariosControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_todos_os_usuarios(): void
    {
        $usuarios = Usuario::factory(10)->create();

        $response = $this->getJson(route('usuarios.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            '*' => [
                'nome', 
                'email', 
                'telefone', 
                'cpf',
                'cargo', 
                'nivel_acesso', 
                'ativo', 
                'ultimo_login'
            ]
        ]);
    }

    public function test_cadastro_usuario_com_sucesso(): void
    {
        $dados = [
            'nome' => fake()->name,
            'email' => fake()->unique()->safeEmail,
            'senha' => '123123ab',
            'telefone' => fake()->cellphoneNumber,
            'cpf' => fake()->cpf(),
            'cargo' => 'Funcionário',
            'nivel_acesso' => 'usuario',
            'ativo' => 1,
        ];

        $response = $this->postJson(route('usuarios.store'), $dados);

        $response->assertCreated();
        $response->assertJson(['message' => 'Usuário cadastrado com sucesso!']);
        $this->assertDatabaseHas('usuarios', [
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'telefone' => $dados['telefone'],
            'cpf' => $dados['cpf'],
            'cargo' => 'Funcionário',
            'nivel_acesso' => 'usuario',
            'ativo' => 1,
        ]);
    }

    public function test_mostrar_dados_de_um_usuario(): void
    {
        $usuario = Usuario::factory()->create();
        
        $response = $this->getJson(route('usuarios.show', $usuario->id));

        $response->assertOk();
        $response->assertJson($usuario->toArray());
    }

    public function test_usuario_atualizado_com_sucesso(): void
    {
        $usuario = Usuario::factory()->create();
        $dados = [
            'nome' => fake()->name,
            'email' => fake()->unique()->safeEmail,
            'senha' => '123123ab',
            'telefone' => fake()->cellphoneNumber,
            'cpf' => fake()->cpf(),
            'cargo' => 'Funcionário',
            'nivel_acesso' => 'usuario',
            'ativo' => 1,
        ];

        $response = $this->putJson(route('usuarios.update', $usuario->id), $dados);

        $response->assertOk();
        $response->assertJson(['message' => 'Usuário atualizado com sucesso!']);
        $this->assertDatabaseHas('usuarios', [
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'telefone' => $dados['telefone'],
            'cpf' => $dados['cpf'],
            'cargo' => 'Funcionário',
            'nivel_acesso' => 'usuario',
            'ativo' => 1,
        ]);
        $this->assertDatabaseMissing('usuarios', [
            'nome' => $usuario->nome,
            'email' => $usuario->email,
            'telefone' => $usuario->telefone,
            'cpf' => $usuario->cpf,
            'cargo' => 'Funcionário',
            'nivel_acesso' => 'usuario',
        ]);
    }

    public function test_deleta_usuario_com_sucesso(): void
    {
        $usuario = Usuario::factory()->create();

        $response = $this->deleteJson(route('usuarios.destroy', $usuario->id));

        $response->assertOk();
        $response->assertJson(['message' => 'Usuário deletado com sucesso!']);
        $this->assertDatabaseMissing('usuarios', $usuario->toArray());
    }
}
