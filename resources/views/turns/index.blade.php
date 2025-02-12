@extends('layouts.client')

@section('content')
    <h1>Turnos Médicos</h1>
    @livewire('turns.turn-index')
    @livewire('turns.turn-form')
@endsection
