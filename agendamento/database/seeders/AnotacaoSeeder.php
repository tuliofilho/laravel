<?php

// database/seeders/AnotacaoSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anotacao;
use App\Models\Paciente;

class AnotacaoSeeder extends Seeder
{
    public function run()
    {
        Paciente::all()->each(function ($paciente) {
            Anotacao::factory()->count(5)->create(['paciente_id' => $paciente->id]);
        });
    }
}
