<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgendamentoRequest;
use App\Models\Agendamento;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function store(StoreAgendamentoRequest $request)
    {
        Agendamento::create($request->validated());
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento criado com sucesso!');
    }
}
