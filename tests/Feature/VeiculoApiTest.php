<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Veiculo;

class VeiculoApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_cria_veiculo()
    {
        $data = [
            'veiculo' => 'Uno',
            'marca' => 'Fiat',
            'ano' => 2010,
            'descricao' => 'Econômico',
            'vendido' => false
        ];

        $response = $this->postJson('/api/veiculos', $data);
        $response->assertStatus(201)
                 ->assertJsonFragment(['veiculo' => 'Uno']);
    }

    public function test_lista_veiculos()
    {
        Veiculo::factory()->count(2)->create();

        $response = $this->getJson('/api/veiculos');
        $response->assertStatus(200)->assertJsonCount(2);
    }

    public function test_busca_veiculo_por_id()
    {
        $veiculo = Veiculo::factory()->create();

        $response = $this->getJson("/api/veiculos/{$veiculo->id}");
        $response->assertStatus(200)
                 ->assertJsonFragment(['id' => $veiculo->id]);
    }

    public function test_atualiza_veiculo_com_put()
    {
        $veiculo = Veiculo::factory()->create();

        $dados = [
            'veiculo' => 'Gol',
            'marca' => 'Volkswagen',
            'ano' => 2022,
            'descricao' => 'Novo modelo',
            'vendido' => true
        ];

        $response = $this->putJson("/api/veiculos/{$veiculo->id}", $dados);
        $response->assertStatus(200)
                 ->assertJsonFragment(['veiculo' => 'Gol']);
    }

    public function test_atualiza_veiculo_com_patch()
    {
        $veiculo = Veiculo::factory()->create();

        $response = $this->patchJson("/api/veiculos/{$veiculo->id}", [
            'descricao' => 'Atualizado via PATCH'
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['descricao' => 'Atualizado via PATCH']);
    }

    public function test_deleta_veiculo()
    {
        $veiculo = Veiculo::factory()->create();

        $response = $this->deleteJson("/api/veiculos/{$veiculo->id}");
        $response->assertStatus(204);
    }
}
