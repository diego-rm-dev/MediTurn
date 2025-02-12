<?php

namespace App\Livewire\Specialties;

use App\Models\Specialty;
use Livewire\Component;

class SpecialtyIndex extends Component
{
    public function render()
    {
        return view('livewire.specialties.specialty-index', [
            'specialties' => Specialty::all()
        ]);
    }
}
