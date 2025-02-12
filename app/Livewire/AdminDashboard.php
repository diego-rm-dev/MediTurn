<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class AdminDashboard extends Component
{


    public function render()
    {
        return view('livewire.admin-dashboard', ["users" => User::all()])->layout('layouts.app');
    }

    public function delete($id)
    {
        User::find($id)->delete();
    }
}
