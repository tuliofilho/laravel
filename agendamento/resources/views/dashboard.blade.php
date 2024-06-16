@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="#" id="patientsMenu">Pacientes</a></li>
            <li><a href="#" id="calendarMenu">Calendário</a></li>
        </ul>
    </div>
    <div class="content">
        <div id="calendarContainer">
            <div class="row">
                <div class="col-md-4">
                    <div id="datepicker"></div>
                </div>
                <div class="col-md-8">
                    <h3>Agendamentos</h3>
                    <table class="table" id="appointmentsTable">
                        <thead>
                            <tr>
                                <th>Descrição</th>
                                <th>Data</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Agendamentos serão carregados aqui -->
                        </tbody>
                    </table>
                    <button class="btn btn-primary mt-3" id="createAppointment">Criar Agendamento</button>
                </div>
            </div>
        </div>
        <div id="patientsList" style="display: none;">
            <h3>Pacientes Cadastrados</h3>
            <button class="btn btn-success mb-3" id="addNewPatient">Adicionar Novo Paciente</button>
            <ul class="list-group">
                @foreach ($pacientes as $paciente)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $paciente->nome }}</span>
                        <div>
                            <button class="btn btn-info btn-sm viewPatientDetails" data-id="{{ $paciente->id }}">Ver Detalhes</button>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@include('modals.patient_details')
@include('modals.new_patient')
@include('modals.appointment')
@endsection
