<?php

// routes/api.php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AgendamentoController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('patients', [PacienteController::class, 'index']);
Route::post('patients', [PacienteController::class, 'store']);
Route::get('patients/{id}', [PacienteController::class, 'show']);
Route::put('patients/{id}', [PacienteController::class, 'update']);
Route::delete('patients/{id}', [PacienteController::class, 'destroy']);
Route::get('/all-appointments', [AgendamentoController::class, 'getAllAppointments']);
Route::get('/appointment-details/{id}', [AgendamentoController::class, 'getAppointmentDetails']);
Route::get('/appointments-by-date', [AgendamentoController::class, 'getAppointmentsByDate']);
