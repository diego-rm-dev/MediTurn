<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{


    public $name, $email, $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ];

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Usuario creado correctamente.');

        // Reiniciar los campos después de la creación
        $this->reset(['name', 'email', 'password']);

       
    }

    public function render()
    {
        return view('livewire.create-user')->layout('layouts.app');
    }
}
