<?php

namespace Modules\Usuarios\Tests\Feature\App\Http\Requests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;
use Modules\Usuarios\Models\Usuario;

class StoreUsuarioRequestTest extends TestCase
{
    use RefreshDatabase;

    protected string $routeName = 'usuarios.store';

    public function test_nao_deve_cadastrar_usuario_sem_dados_obrigatorios(): void
    {
        $response = $this->postJson(route($this->routeName), []);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors([
                'nome', 'email', 'senha', 'telefone', 'cpf', 'cargo', 'nivel_acesso'
            ]);
    }

    public function test_email_deve_ser_valido(): void
    {
        $response = $this->postJson(route($this->routeName), ['email' => 'invalido']);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    }

    public function test_email_deve_ser_unico(): void
    {
        $usuario = Usuario::factory()->create();

        $response = $this->postJson(route($this->routeName), ['email' => $usuario->email]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    }

    public function test_senha_deve_ter_minimo_6_e_maximo_8_caracteres(): void
    {
        $response = $this->postJson(route($this->routeName), ['senha' => '123']);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['senha']);

        $response = $this->postJson(route($this->routeName), ['senha' => '123456789']);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['senha']);
    }

    public function test_cpf_deve_ter_formato_valido(): void
    {
        $response = $this->postJson(route($this->routeName), ['cpf' => '12345678900']);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['cpf']);
    }

    public function test_cpf_deve_ser_unico(): void
    {
        $usuario = Usuario::factory()->create();

        $response = $this->postJson(route($this->routeName), ['cpf' => $usuario->cpf]);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['cpf']);
    }

    public function test_telefone_deve_ter_formato_valido(): void
    {
        $response = $this->postJson(route($this->routeName), ['telefone' => '12345']);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['telefone']);
    }

    public function test_nome_deve_ter_entre_3_e_255_caracteres(): void
    {
        $response = $this->postJson(route($this->routeName), ['nome' => 'ab']);
        $response->assertUnprocessable()->assertJsonValidationErrors(['nome']);

        $nome = str_repeat('a', 256);
        $response = $this->postJson(route($this->routeName), ['nome' => $nome]);
        $response->assertUnprocessable()->assertJsonValidationErrors(['nome']);
    }

    public function test_nivel_acesso_deve_ser_valido(): void
    {
        $response = $this->postJson(route($this->routeName), ['nivel_acesso' => 'superadmin']);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['nivel_acesso']);
    }

    public function test_ativo_deve_ser_boolean(): void
    {
        $response = $this->postJson(route($this->routeName), ['ativo' => 'yes']);

        $response->assertUnprocessable()
            ->assertJsonValidationErrors(['ativo']);
    }
}
