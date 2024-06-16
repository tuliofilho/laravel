@extends('layouts.app')

@section('content')
    <h1>Agendamentos</h1>
    <ul>
        @foreach($agendamentos as $agendamento)
            <x-agendamento-item :agendamento="$agendamento"/>
        @endforeach
    </ul>
@endsection
