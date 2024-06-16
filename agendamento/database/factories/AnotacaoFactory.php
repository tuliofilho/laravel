<?php

// database/factories/AnotacaoFactory.php
namespace Database\Factories;

use App\Models\Anotacao;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnotacaoFactory extends Factory
{
    protected $model = Anotacao::class;

    public function definition()
    {
        return [
            'paciente_id' => Paciente::factory(),
            'anotacao' => $this->faker->paragraph,
        ];
    }
}
