<?php

namespace Modules\Estoque\Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Estoque\Models\Categoria;
use Modules\Estoque\Models\Fornecedor;
use Tests\TestCase;

class CategoriaControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $fornecedor = Fornecedor::factory()->create();
    }

    public function test_retorna_todas_as_categorias_com_seus_relationamentos()
    {
        Categoria::factory()->count(3)->create();

        $response = $this->getJson(route('api.estoque.categorias.index'));

        $response->assertOk();
        $response->assertJsonStructure([
            '*' => [
                'fornecedor' => [
                    'razao_social',
                    'nome_fantasia',
                    'cnpj',
                    'inscricao_estadual',
                    'inscricao_municipal',
                    'email',
                    'telefone',
                    'celular',
                    'site',
                    'observacoes',
                    'cep',
                    'logradouro',
                    'numero',
                    'complemento',
                    'bairro',
                    'cidade',
                    'estado',
                    'banco',
                    'agencia',
                    'conta',
                    'tipo_conta',
                    'pix',
                    'responsavel',
                    'ativo',
                ],
                'fornecedor_id',
                'nome_categoria',
                'descricao',
                'produtos' => [
                    '*' => [
                        'categoria_id',
                        'codigo_produto',
                        'nome_produto',
                        'descricao_produto',
                        'preco',
                        'sku',
                        'ncm',
                        'cest',
                        'upc',
                        'ean',
                        'quantidade',
                        'unidade_medida_id',
                        'comprimento',
                        'altura',
                        'largura',
                        'peso',
                        'unidade_peso',
                        'imagem_principal',
                    ]
                ]
            ]
        ]);
    }

    public function test_cadastrar_uma_nova_categoria()
    {
        $fornecedor = Fornecedor::all()->first();
        $data = [
            'fornecedor_id' => $fornecedor->id,
            'nome_categoria' => 'Categoria Teste',
            'descricao' => 'Descrição da categoria',
        ];

        $response = $this->postJson(route('api.estoque.categorias.store'), $data);

        $response->assertStatus(201)
                 ->assertJson([
                     'message' => 'Categoria cadastrada com sucesso!',
                 ]);

        $this->assertDatabaseHas('categorias', ['nome_categoria' => 'Categoria Teste']);
    }

    public function test_mostra_uma_categoria_especifica()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->getJson(route('api.estoque.categorias.show', $categoria->id));

        $response->assertOk();
        $response->assertJson($categoria->toArray());
    }

    public function test_update_modifies_category()
    {
        $categoria = Categoria::factory()->create();
        $data = [
            'nome_categoria' => 'Nome Atualizado',
            'descricao' => 'Nova descrição',
        ];

        $response = $this->putJson(route('api.estoque.categorias.update', $categoria->id), $data);

        $response->assertOk();
        $response->assertJson(['message' => 'Categoria atualizada com sucesso!']);
        $this->assertDatabaseHas('categorias', ['nome_categoria' => 'Nome Atualizado']);
    }

    public function test_deletar_categoria()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->deleteJson(route('api.estoque.categorias.destroy', $categoria));

        $response->assertOk();
        $response->assertJson(['message' => 'Categoria deletada com sucesso!']);
        $this->assertDatabaseMissing('categorias', [
            'id' => $categoria->id
        ]);
    }
}
