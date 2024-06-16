<?php

// app/Http/Controllers/PacienteController.php
namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        return Paciente::all();
    }

    public function store(Request $request)
    {
        $paciente = Paciente::create($request->all());
        return response()->json($paciente, 201);
    }

    public function show($id)
    {
        return Paciente::find($id);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());
        return response()->json($paciente, 200);
    }

    public function destroy($id)
    {
        Paciente::destroy($id);
        return response()->json(null, 204);
    }
}
