<?php

namespace Modules\Estoque\Tests\Feature\App\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Estoque\Models\Categoria;
use Modules\Estoque\Models\Fornecedor;
use Tests\TestCase;
use Modules\Estoque\Models\Produto;
use Modules\Estoque\Models\UnidadeMedida;

class UnidadeMedidaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_lista_todas_as_unidades_de_medidas(): void
    {
        $UnidadesMedidas = UnidadeMedida::factory(10)->create();

        $response = $this->getJson(route('api.estoque.unidade.medida.index'));
        $response->assertOk();
    }

    public function test_cadastro_nova_unidade_medida(): void
    {
        $dados = [
            'nome_unidade' => 'Unitário',
            'sigla' => 'UN',
        ];

        $response = $this->postJson(route('api.estoque.unidade.medida.store'), $dados);

        $response->assertCreated();
        $response->assertJson(['message' => 'Unidade de medida criada com sucesso!']);
        $this->assertDatabaseHas('unidade_medidas', $dados);
    }

    public function test_mostrar_uma_unidade_de_medida_especifica(): void
    {
        Fornecedor::factory()->create();
        Categoria::factory()->create();
        $unidadesMedida = UnidadeMedida::factory()->create();
        Produto::factory(5)->create(['unidade_medida_id' => $unidadesMedida->id]);

        $response = $this->getJson(route('api.estoque.unidade.medida.show', $unidadesMedida->id));

        $response->assertOk();
        $response->assertJsonStructure([
            'nome_unidade',
            'sigla',
            'produtos' => [
                '*' => [
                    'id',
                    'nome_produto'
                ]
            ]
        ]);
    }

    public function test_atualizar_dados_unidade_medida(): void
    {
         $unidadeMedida = UnidadeMedida::factory()->create();

         $dados = [
            'nome_unidade' => 'Métro',
            'sigla' => 'MT',
        ];

        $response = $this->putJson(route('api.estoque.unidade.medida.update', $unidadeMedida->id), $dados);

        $response->assertOk();
        $response->assertJson(['message' => 'Unidade de medida atualizada com sucesso!']);
        $this->assertDatabaseHas('unidade_medidas', $dados);
    }

    public function test_excluir_unidade_medida(): void
    {
        $unidadeMedida = UnidadeMedida::factory()->create();

        $response = $this->deleteJson(route('api.estoque.unidade.medida.destroy', $unidadeMedida->id));

        $response->assertOk();
        $response->assertJson(['message' => 'Unidade de medida excluída com sucesso!']);
        $this->assertDatabaseMissing('unidade_medidas', [
            'id' => $unidadeMedida->id
        ]);
    }
}
