<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    public function getAllAppointments()
    {
        $appointments = Agendamento::with('paciente')->get();

        return response()->json($appointments->map(function($appointment) {
            return [
                'id' => $appointment->id,
                'title' => $appointment->descricao,
                'start' => $appointment->data,
                'color' => $appointment->paciente->color ?? '#3788d8' // Assumindo que cada paciente tem uma propriedade de cor
            ];
        }));
    }

    public function getAppointmentDetails($id)
    {
        $appointment = Agendamento::find($id);

        return response()->json($appointment);
    }

    public function getAppointmentsByDate(Request $request)
    {
        $date = $request->get('date');
        $appointments = Agendamento::whereDate('data', $date)->get();

        return response()->json($appointments);
    }
}
