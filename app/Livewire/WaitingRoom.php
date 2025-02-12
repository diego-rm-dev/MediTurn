<?php

namespace App\Livewire;

use App\Models\Turn;
use Livewire\Attributes\Layout;
use Livewire\Component;

class WaitingRoom extends Component
{
    #[Layout('layouts.client')] // Aquí defines el layout correcto

    public function render()
    {

        return view('livewire.waiting-room', [
            'turns' => Turn::where('status', 'pending')->get()
        ]);
    }
}
