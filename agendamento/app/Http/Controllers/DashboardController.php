<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Agendamento;

class DashboardController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('dashboard', compact('pacientes'));
    }
}
