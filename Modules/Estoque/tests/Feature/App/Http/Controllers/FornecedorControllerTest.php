<?php

namespace Modules\Estoque\Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Estoque\Models\Fornecedor;
use Tests\TestCase;
use Illuminate\Support\Str;

class FornecedorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_todos_os_fornecedores(): void
    {
        $fornecedores = Fornecedor::factory(10)->create();

        $response = $this->getJson(route('api.estoque.fornecedor.index'));
        $response->assertOk();
        $response->assertJson($fornecedores->toArray());
    }

    public function test_cadastro_novo_fornecedor(): void
    {
        $dados = [
            'razao_social' => fake()->company,
            'nome_fantasia' => fake()->companySuffix,
            'cnpj' => fake()->unique()->cnpj(false),
            'inscricao_estadual' => fake()->unique()->numerify('###.###.###.###'),
            'inscricao_municipal' => fake()->unique()->numerify('###.###.###'),
            'email' => fake()->unique()->safeEmail,
            'telefone' => fake()->optional()->phoneNumber,
            'celular' => fake()->cellphoneNumber,
            'site' => fake()->optional()->url,
            'observacoes' => fake()->optional()->paragraph,
            'cep' => fake()->postcode,
            'logradouro' => fake()->streetName,
            'numero' => fake()->buildingNumber,
            'complemento' => fake()->optional()->secondaryAddress,
            'bairro' => fake()->citySuffix,
            'cidade' => fake()->city,
            'estado' => fake()->stateAbbr,
            'banco' => fake()->randomElement(['Banco do Brasil', 'Caixa', 'Bradesco', 'Itaú', 'Nubank']),
            'agencia' => fake()->numerify('####'),
            'conta' => fake()->numerify('########'),
            'tipo_conta' => fake()->randomElement(['conta_corrente', 'conta_poupanca', 'outros']),
            'pix' => fake()->uuid,
            'responsavel' => fake()->name,
            'ativo' => 1,
        ];

        $response = $this->postJson(route('api.estoque.fornecedor.store'), $dados);

        $response->assertCreated();
        $response->assertJson(['message' => 'Fornecedor cadastrado com sucesso!']);
        $this->assertDatabaseHas('fornecedores', $dados);
    }

    public function test_mostrar_um_fornecedor_especifico(): void
    {
        $fornecedor = Fornecedor::factory()->create();

        $response = $this->getJson(route('api.estoque.fornecedor.show', $fornecedor->id));

        $response->assertOk();
        $response->assertJson($fornecedor->toArray());
    }

    public function test_atualizar_dados_fornecedor(): void
    {
         $fornecedor = Fornecedor::factory()->create();

         $dados = [
            'razao_social' => fake()->company,
            'nome_fantasia' => fake()->companySuffix,
            'cnpj' => fake()->unique()->cnpj(false),
            'inscricao_estadual' => fake()->unique()->numerify('###.###.###.###'),
            'inscricao_municipal' => fake()->unique()->numerify('###.###.###'),
            'email' => fake()->unique()->safeEmail,
            'telefone' => fake()->optional()->phoneNumber,
            'celular' => fake()->cellphoneNumber,
            'site' => fake()->optional()->url,
            'observacoes' => fake()->optional()->paragraph,
            'cep' => fake()->postcode,
            'logradouro' => fake()->streetName,
            'numero' => fake()->buildingNumber,
            'complemento' => fake()->optional()->secondaryAddress,
            'bairro' => fake()->citySuffix,
            'cidade' => fake()->city,
            'estado' => fake()->stateAbbr,
            'banco' => fake()->randomElement(['Banco do Brasil', 'Caixa', 'Bradesco', 'Itaú', 'Nubank']),
            'agencia' => fake()->numerify('####'),
            'conta' => fake()->numerify('########'),
            'tipo_conta' => fake()->randomElement(['conta_corrente', 'conta_poupanca', 'outros']),
            'pix' => fake()->uuid,
            'responsavel' => fake()->name,
            'ativo' => 1,
        ];

        $response = $this->putJson(route('api.estoque.fornecedor.update', $fornecedor->id), $dados);

        $response->assertOk();
        $response->assertJson(['message' => 'Fornecedor atualizado com sucesso!']);
        $this->assertDatabaseHas('fornecedores', $dados);
    }

    public function test_excluir_fornecedor(): void
    {
        $fornecedor = Fornecedor::factory()->create();

        $response = $this->deleteJson(route('api.estoque.fornecedor.destroy', $fornecedor->id));

        $response->assertOk();
        $response->assertJson(['message' => 'Fornecedor excluído com sucesso!']);
        $this->assertDatabaseMissing('fornecedores', [
            'id' => $fornecedor->id
        ]);
    }
}
