<?php

namespace App\Livewire\Turns;

use App\Models\Turn;
use Livewire\Component;

class TurnIndex extends Component
{
    public function render()
    {
        return view('livewire.turns.turn-index', [
            'turns' => Turn::all()
        ]);
    }
}
