<?php

namespace Modules\Estoque\Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Estoque\Models\Categoria;
use Modules\Estoque\Models\Fornecedor;
use Modules\Estoque\Models\Produto;
use Tests\TestCase;
use Modules\Estoque\Models\UnidadeMedida;

class ProdutoControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Fornecedor::factory()->create();
        Categoria::factory()->create();
        UnidadeMedida::factory()->create();
    }

    public function test_lista_todos_os_produtos(): void
    {
        $produtos = Produto::factory(10)->create();

        $response = $this->getJson(route('api.estoque.produto.index'));
        $response->assertOk();
        $response->assertJson($produtos->toArray());
    }

    public function test_cadastro_novo_produto(): void
    {
        $categoria = Categoria::inRandomOrder()->first();
        $dados = [
            'categoria_id' => $categoria->id,
            'nome_produto' => fake()->name(),
            'descricao_produto' => fake()->sentence,
            'preco' => fake()->randomFloat(2, 1, 1000),
            'sku' => fake()->bothify('SKU-#####'),
            'ncm' => fake()->numerify('########'),
            'cest' => fake()->numerify('#######'),
            'upc' => fake()->numerify('############'),
            'ean' => fake()->numerify('##############'),
            'quantidade' => fake()->numberBetween(1, 100),
            'unidade_medida_id' => UnidadeMedida::inRandomOrder()->first()->id,
            'comprimento' => fake()->randomFloat(2, 0.1, 100),
            'altura' => fake()->randomFloat(2, 0.1, 100),
            'largura' => fake()->randomFloat(2, 0.1, 100),
            'peso' => fake()->randomFloat(2, 0.1, 100),
            'unidade_peso' => fake()->randomElement(['quilograma', 'grama']),
            'imagem_principal' => fake()->imageUrl,
            'razao_social' => fake()->company,
            'nome_fantasia' => fake()->companySuffix,
            'cnpj' => fake()->unique()->cnpj(false),
            'inscricao_estadual' => fake()->unique()->numerify('###.###.###.###'),
            'inscricao_municipal' => fake()->unique()->numerify('###.###.###'),
            'email' => fake()->unique()->safeEmail,
            'telefone' => fake()->phoneNumber,
            'celular' => fake()->cellphoneNumber,
            'site' => fake()->url,
            'observacoes' => fake()->paragraph,
            'cep' => fake()->postcode,
            'logradouro' => fake()->streetName,
            'numero' => fake()->buildingNumber,
            'complemento' => fake()->secondaryAddress,
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


        $response = $this->postJson(route('api.estoque.produto.store'), $dados);

        $response->assertCreated();
        $response->assertJson(['message' => 'Produto cadastrado com sucesso!']);
        $this->assertDatabaseHas('produtos',[
            'categoria_id' => $dados['categoria_id'],
            'nome_produto' => $dados['nome_produto'],
            'descricao_produto' => $dados['descricao_produto'],
            'preco' => $dados['preco'],
            'sku' => $dados['sku'],
            'ncm' => $dados['ncm'],
            'cest' => $dados['cest'],
            'upc' => $dados['upc'],
            'ean' => $dados['ean'],
        ]);
    }

    public function test_mostrar_um_produto_especifico(): void
    {
        $produto = produto::factory()->create();

        $response = $this->getJson(route('api.estoque.produto.show', $produto->id));

        $response->assertOk();
        $response->assertJson($produto->toArray());
    }

    public function test_atualizar_dados_produto(): void
    {
        $produto = produto::factory()->create();
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

        $response = $this->putJson(route('api.estoque.produto.update', $produto->id), $dados);

        $response->assertOk();
        $response->assertJson(['message' => 'Produto atualizado com sucesso!']);
    }

    public function test_excluir_produto(): void
    {
        $produto = produto::factory()->create();

        $response = $this->deleteJson(route('api.estoque.produto.destroy', $produto->id));

        $response->assertOk();
        $response->assertJson(['message' => 'Produto excluído com sucesso!']);
        $this->assertDatabaseMissing('produtos', [
            'id' => $produto->id
        ]);
    }
}
