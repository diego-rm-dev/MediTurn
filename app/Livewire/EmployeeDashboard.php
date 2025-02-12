<?php

namespace App\Livewire;

use App\Models\Turn;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EmployeeDashboard extends Component
{

    #[Layout('layouts.client')] // Aquí defines el layout correcto
    public $turnsGynecology;
    public $turnsPediatrics;
    public $turnsCardiology;

    public $flashMessage = null;
    public $alertMessage = null;

    public $turnDelete;

    public function mount()
    {
        $this->loadTurns();
    }

    public function loadTurns()
    {
        $this->turnsGynecology = Turn::whereIn('status', ['pending', 'in_progress'])
            ->where('specialty_id', 2)
            ->orderByRaw("FIELD(status, 'in_progress', 'pending')")
            ->orderBy('created_at', 'asc')
            ->take(5)
            ->get();

        $this->turnsPediatrics = Turn::whereIn('status', ['pending', 'in_progress'])
            ->where('specialty_id', 3)
            ->orderByRaw("FIELD(status, 'in_progress', 'pending')")
            ->orderBy('created_at', 'asc')
            ->take(5)
            ->get();

        $this->turnsCardiology = Turn::whereIn('status', ['pending', 'in_progress'])
            ->where('specialty_id', 4)
            ->orderByRaw("FIELD(status, 'in_progress', 'pending')")
            ->orderBy('created_at', 'asc')
            ->take(5)
            ->get();
    }

    public function deleteTurn($turnId)
    {
        $turnDelete = Turn::find($turnId);
        $turnDelete->delete();
        $this->alertMessage = "El turno {$turnDelete->turn_number} ha sido eliminado.";
        $this->dispatch('turnsUpdated');
        $this->loadTurns();
    }

    public function prioritizeTurn($turnId)
    {
        // Encontrar el turno a priorizar
        $turn = Turn::find($turnId);

        if ($turn) {
            // Poner en 'pending' los demás turnos "in_progress" SOLO de la misma especialidad
            Turn::where('status', 'in_progress')
                ->where('specialty_id', $turn->specialty_id)
                ->update(['status' => 'pending']);

            // Asignar este turno como "in_progress"
            $turn->status = 'in_progress';
            $turn->save();

            $this->flashMessage = "El turno {$turn->turn_number} ahora está en progreso.";
        }

        $this->dispatch('turnsUpdated');

        $this->loadTurns();
    }

    public function completeTurn($turnId)
    {
        $turn = Turn::find($turnId);
        if ($turn) {
            $turn->status = 'finished';
            $turn->save();

            $this->flashMessage = "El turno {$turn->turn_number} ha sido completado.";
        }

        $this->dispatch('turnsUpdated');
        $this->loadTurns();
    }


    public function render()
    {
        return view('livewire.employee-dashboard');
    }
}
