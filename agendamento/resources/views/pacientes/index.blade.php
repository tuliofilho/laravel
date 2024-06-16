@extends('layouts.app')

@section('content')
    <h1>Pacientes</h1>
    <a href="{{ route('pacientes.create') }}">Adicionar Paciente</a>
    <ul>
        @foreach($pacientes as $paciente)
            <li>{{ $paciente->nome }} - {{ $paciente->data_nascimento }}</li>
        @endforeach
    </ul>
@endsection
