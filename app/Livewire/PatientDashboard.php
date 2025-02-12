<?php

namespace App\Livewire;

use App\Models\Specialty;
use App\Models\Turn;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PatientDashboard extends Component
{
    #[Layout('layouts.client')] // Aquí defines el layout correcto

    public $step = 1; // 1: Selección de especialidad, 2: Ingreso de documento
    public $selectedSpecialty;
    public $patientDocument;
    public $generatedTurn;

    public function selectSpecialty($specialtyId)
    {
        $this->selectedSpecialty = Specialty::find($specialtyId);
        $this->step = 2; // Cambiar a la vista del formulario de documento
    }

    public function generateTurn()
    {
        $this->validate([
            'patientDocument' => 'required|string|max:20'
        ]);

        // Generar una letra aleatoria de la A-Z
        $randomLetter = chr(rand(65, 90));

        // Generar un número aleatorio de 3 dígitos
        $randomNumber = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);

        // Concatenar para formar el código de turno
        $this->generatedTurn = "{$randomLetter}-{$randomNumber}";

        // Guardar en la base de datos
        Turn::create([
            'turn_number' => $this->generatedTurn,
            'patient_document' => $this->patientDocument,
            'specialty_id' => $this->selectedSpecialty->id,
            'status' => 'pending'
        ]);

        session()->flash('message', "Turno generado con éxito: {$this->generatedTurn}");

        // Esperar 5 segundos antes de reiniciar automáticamente
        sleep(5);

        // Redirigir al componente para reiniciar
        return redirect()->route('patient.dashboard');
    }


    public function render()
    {
        return view('livewire.patient-dashboard', [
            'specialties' => Specialty::all()
        ]);
    }
}
