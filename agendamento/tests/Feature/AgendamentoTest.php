<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AgendamentoTest extends TestCase
{
    use RefreshDatabase;

    public function test_agendamento_criado_com_sucesso()
    {
        $response = $this->post('/agendamentos', [
            'nome' => 'Teste',
            'data' => now(),
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('agendamentos', ['nome' => 'Teste']);
    }
}
