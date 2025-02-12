<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\TurnController;
use App\Livewire\EmployeeDashboard;
use App\Livewire\PatientDashboard;
use App\Livewire\WaitingRoom;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


// Especialidades
Route::get('/specialties', [SpecialtyController::class, 'index'])->name('specialties.index');

// Turnos
Route::get('/turns', [TurnController::class, 'index'])->name('turns.index');

Route::get('/waiting-room', WaitingRoom::class);
Route::get('/patient-dashboard', PatientDashboard::class)->name('patient.dashboard');
Route::get('/employee-dashboard', EmployeeDashboard::class)->name('employee.dashboard');

Route::get('/descargar-turno/{turn_number}', [PDFController::class, 'downloadPDF'])->name('descargar.pdf');
