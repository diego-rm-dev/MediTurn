<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateUser extends Component
{
    public $userId, $name, $email, $role;

    public function mount($user)
    {
        $usuario = User::findOrFail($user);
        $this->userId = $usuario->id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->role = $usuario->role;
    }

    public function updateUser()
    {
        $usuario = User::findOrFail($this->userId);
        $usuario->update([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role
        ]);

        session()->flash('message', 'Usuario actualizado correctamente.');
    }

    public function render()
    {
        return view('livewire.update-user')->layout('layouts.client');
    }
}
