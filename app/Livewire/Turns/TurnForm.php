<?php

namespace App\Livewire\Turns;

use App\Models\Specialty;
use App\Models\Turn;
use Livewire\Component;

class TurnForm extends Component
{
    public $turn_number, $patient_document, $specialty_id, $status;

    public function save()
    {
        $this->validate([
            'turn_number' => 'required|string|unique:turns,turn_number',
            'patient_document' => 'required|string',
            'specialty_id' => 'required|exists:specialties,id',
            'status' => 'required|in:pending,in_progress,finished,cancelled',
        ]);

        Turn::create([
            'turn_number' => $this->turn_number,
            'patient_document' => $this->patient_document,
            'specialty_id' => $this->specialty_id,
            'status' => $this->status,
        ]);

        $this->reset();
        session()->flash('message', 'Turno creado con éxito');
        $this->dispatch('turn-updated');
    }

    public function render()
    {
        return view('livewire.turns.turn-form', [
            'specialties' => Specialty::all()
        ]);
    }
}
