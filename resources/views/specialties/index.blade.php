@extends('layouts.crud')

@section('content')
    <h1>Especialidades Médicas</h1>
    @livewire('specialties.specialty-index')
    @livewire('specialties.specialty-form')
@endsection
    