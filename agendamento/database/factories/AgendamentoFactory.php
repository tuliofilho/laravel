<?php

// database/factories/AgendamentoFactory.php
namespace Database\Factories;

use App\Models\Agendamento;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendamentoFactory extends Factory
{
    protected $model = Agendamento::class;

    public function definition()
    {
        return [
            'paciente_id' => Paciente::factory(),
            'data' => $this->faker->dateTimeBetween('-1 month', '+1 month'),
            'descricao' => $this->faker->sentence,
        ];
    }
}
