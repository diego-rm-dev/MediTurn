<?php

namespace App\Livewire\Specialties;

use App\Models\Specialty;
use Livewire\Component;

class SpecialtyForm extends Component
{

    public $name, $time_limit_average, $internal_code;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'time_limit_average' => 'nullable|integer',
            'internal_code' => 'nullable|string|max:50',
        ]);

        Specialty::create([
            'name' => $this->name,
            'time_limit_average' => $this->time_limit_average,
            'internal_code' => $this->internal_code,
        ]);

        $this->reset();
        session()->flash('message', 'Especialidad creada con éxito');
    }

    public function render()
    {
        return view('livewire.specialties.specialty-form');
    }
}
