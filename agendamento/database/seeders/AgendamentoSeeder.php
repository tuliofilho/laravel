<?php

// database/seeders/AgendamentoSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agendamento;
use App\Models\Paciente;

class AgendamentoSeeder extends Seeder
{
    public function run()
    {
        Paciente::all()->each(function ($paciente) {
            Agendamento::factory()->count(5)->create(['paciente_id' => $paciente->id]);
        });
    }
}
