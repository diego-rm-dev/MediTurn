<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdateUser extends Component
{
    public $userId, $name, $email, $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'nullable|string|min:6',
    ];

    protected $listeners = ['editUser'];

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function update()
    {
        $this->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->userId)],
        ]);

        $user = User::findOrFail($this->userId);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
        ]);

        session()->flash('message', 'Usuario actualizado correctamente.');

        $this->emit('userUpdated'); // Emitir evento para actualizar la lista
    }

    public function render()
    {
        return view('livewire.update-user')->layout('layouts.app');
    }
}
