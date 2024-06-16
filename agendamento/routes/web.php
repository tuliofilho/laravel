<?php

use Illuminate\Support\Facades\Route;

    // routes/web.php
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PacienteController;
    use App\Http\Controllers\AgendamentoController;
    use Illuminate\Http\Request;
    
    Route::resource('pacientes', PacienteController::class);
    Route::resource('agendamentos', AgendamentoController::class);
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rota para buscar agendamentos por paciente
    Route::get('/api/patient-schedule/{id}', function($id) {
        $agendamentos = App\Models\Agendamento::where('paciente_id', $id)->get(['descricao as title', 'data as start']);
        return response()->json($agendamentos);
    });
    
    // Rota para buscar detalhes do paciente
    Route::get('/api/patient-details/{id}', function($id) {
        $paciente = App\Models\Paciente::with('anotacoes')->find($id);
        return response()->json($paciente);
    });
    
    // Rota para criar agendamento
    Route::post('/api/create-appointment', function(Request $request) {
        $appointment = new App\Models\Agendamento();
        $appointment->paciente_id = $request->paciente_id;
        $appointment->data = $request->data;
        $appointment->descricao = $request->descricao;
        $appointment->save();
        return response()->json(['success' => true]);
    });
    
    // Rota para criar anotação
    Route::post('/api/create-note', function(Request $request) {
        $note = new App\Models\Anotacao();
        $note->paciente_id = $request->paciente_id;
        $note->anotacao = $request->anotacao;
        $note->save();
        return response()->json(['success' => true]);
    });
    
    // Rota para atualizar paciente
    Route::post('/api/update-patient/{id}', function(Request $request, $id) {
        $paciente = App\Models\Paciente::find($id);
        $paciente->update($request->all());
        return response()->json(['success' => true]);
    });
    