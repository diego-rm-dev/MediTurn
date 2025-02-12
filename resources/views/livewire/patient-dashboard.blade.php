<div class="p-6 bg-white rounded-lg shadow-md min-h-screen flex flex-col justify-center items-center relative">
    @if ($step === 1)
        {{-- Contenedor del título --}}
        <div class="absolute top-0 left-0 w-full text-center pt-4 md:pt-6 px-4">
            <h2 style="font-size: 2rem; font-weight: 500; text-align: center; max-width: 90%; margin: auto;">
                Selecciona Departamento
            </h2>
        </div>

        <div class="w-full max-w-3xl flex flex-col items-center space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                {{-- Generamos los botones dinámicamente --}}
                @foreach($specialties as $specialty)
                    @php
                        // Obtener la imagen según el internal_code
                        $iconPath = match($specialty->internal_code) {
                            'GNC' => 'icons/icono-4.svg', // Ginecología
                            'PDT' => 'icons/icono-3.svg', // Pediatría
                            'CDG' => 'icons/icono-1.svg', // Cardiología
                            default => 'icons/default.svg' // Imagen por defecto
                        };

                        // Detectar si este es el último en un número impar de especialidades
                        $isLastOdd = ($loop->last && $loop->remaining % 2 == 0);
                    @endphp

                    <button wire:click="selectSpecialty({{ $specialty->id }})"
                            wire:key="specialty-{{ $specialty->id }}"
                            style="
                                background-color: #01BFA5;
                                text-align: left;
                                width: 100%;
                                height: 160px;
                                padding: 1rem 1.5rem;
                                border-radius: 10px;
                                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                                display: flex;
                                align-items: center;
                                justify-content: start;
                                gap: 2rem;
                                font-size: 1.8rem;
                                font-weight: 500;
                                color: white;
                                transition: background 0.3s, transform 0.2s;
                            "
                            onmouseover="this.style.backgroundColor='#0fa28e'"
                            onmouseout="this.style.backgroundColor='#01BFA5'"
                            onmousedown="this.style.transform='scale(0.95)'"
                            onmouseup="this.style.transform='scale(1)'">
                        <img src="{{ asset($iconPath) }}" alt="{{ $specialty->name }}" style="width: 64px; height: 64px; object-fit: contain;">
                        <span style="font-size: 1.8rem; font-weight: 500;">
                            {{ $specialty->name }}
                        </span>
                    </button>
                @endforeach
            </div>
        </div>

    @elseif ($step === 2)
        {{-- Vista de Ingreso de Documento --}}
        <div class="flex flex-col items-center justify-center min-h-screen">
            <h2 style="font-size: 2rem; font-weight: 500; margin-bottom: 1.5rem; text-align: center;">
                Ingresa tu número de documento
            </h2>
            
            <div class="w-full max-w-md">
                <input type="text" wire:model="patientDocument"
                       style="width: 100%; border: 1px solid #d1d5db; border-radius: 6px; padding: 12px; text-align: center; font-size: 1.2rem; box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);">

                @error('patientDocument') 
                    <span style="color: red; font-size: 0.9rem; display: block; margin-top: 8px; text-align: center;">{{ $message }}</span> 
                @enderror

                <button wire:click="generateTurn"
                        style="
                            display: block;
                            width: 100%;
                            margin-top: 1.5rem;
                            background-color: #14b8a6;
                            color: white;
                            font-size: 1.125rem;
                            font-weight: 600;
                            padding: 0.75rem 1.5rem;
                            border-radius: 0.375rem;
                            transition: background-color 0.3s, transform 0.2s;
                            text-align: center;
                            border: none;
                        "
                        onmouseover="this.style.backgroundColor='#0f9e8a'"
                        onmouseout="this.style.backgroundColor='#14b8a6'"
                        onmousedown="this.style.transform='scale(0.95)'"
                        onmouseup="this.style.transform='scale(1)'">
                    Generar turno
                </button>
            </div>
        </div>
    @endif

{{-- Modal de confirmación --}}
@if ($generatedTurn)
    <div style="
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    ">
        <div style="
            background: white;
            padding: 2rem;
            border-radius: 10px;
            text-align: center;
            width: 400px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        ">
            <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;">
                Turno generado exitosamente
            </h3>
            <p style="font-size: 1.2rem; margin-bottom: 1.5rem;">
                Su número de turno es: <strong>{{ $generatedTurn }}</strong>
            </p>
            <button wire:click="closeModal"
                    style="
                        background-color: #14b8a6;
                        color: white;
                        font-size: 1rem;
                        padding: 0.5rem 1rem;
                        border-radius: 5px;
                        border: none;
                        cursor: pointer;
                        transition: background-color 0.3s;
                    "
                    onmouseover="this.style.backgroundColor='#0f9e8a'"
                    onmouseout="this.style.backgroundColor='#14b8a6'">
                Aceptar
            </button>
        </div>
    </div>
@endif
</div>
