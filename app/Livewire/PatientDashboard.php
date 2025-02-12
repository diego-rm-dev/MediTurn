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

        // Generar un código de turno aleatorio
        $randomLetter = chr(rand(65, 90)); // Letra A-Z
        $randomNumber = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $this->generatedTurn = "{$randomLetter}-{$randomNumber}";

        // Guardar en la base de datos
        Turn::create([
            'turn_number' => $this->generatedTurn,
            'patient_document' => $this->patientDocument,
            'specialty_id' => $this->selectedSpecialty->id,
            'status' => 'pending'
        ]);
    }

    // Método para cerrar el modal
    public function closeModal()
    {
        $this->generatedTurn = null;
        $this->patientDocument = null; // Limpiar el campo del documento
        $this->selectedSpecialty = null;
        $this->step = 1; // Regresar al paso 1
    }
    

    public function render()
    {
        return view('livewire.patient-dashboard', [
            'specialties' => Specialty::all()
        ]);
    }
}
