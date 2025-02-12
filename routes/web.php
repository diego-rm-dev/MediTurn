<?php

use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\TurnController;
use App\Livewire\AdminDashboard;
use App\Livewire\CreateUser;
use App\Livewire\PatientDashboard;
use App\Livewire\WaitingRoom;
use App\Models\User;
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
    Route::get('/admin/users', AdminDashboard::class)->name('users.index');
    Route::get('/admin/users/crear', CreateUser::class)->name('users.create');
});


// Especialidades
Route::get('/specialties', [SpecialtyController::class, 'index'])->name('specialties.index');

// Turnos
Route::get('/turns', [TurnController::class, 'index'])->name('turns.index');
Route::get('/waiting-room', WaitingRoom::class);
Route::get('/patient-dashboard', PatientDashboard::class)->name('patient.dashboard');
