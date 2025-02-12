<div class="bg-white rounded-lg shadow-md min-h-screen flex flex-col justify-center items-center relative" style="padding: 10%">
    @if ($step === 1)
        {{-- Contenedor del título --}}
        <div class="absolute top-0 left-0 w-full text-center pt-4 md:pt-6 px-4">
            <h2 style="font-size: 2rem; font-weight: 500; text-align: center; max-width: 90%; margin: auto;">
                Selecciona Departamento
            </h2>
        </div>

        @php
            $specialtiesCount = count($specialties); // Contamos las especialidades
            $isOdd = $specialtiesCount % 2 !== 0; // Verificamos si es impar
            $lastSpecialty = null;
        @endphp

        <div class="w-full max-w-3xl flex flex-col items-center space-y-6">
            {{-- Grid solo con los pares --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
                @foreach($specialties as $index => $specialty)
                    @php
                        $iconPath = match($specialty->internal_code) {
                            'GNC' => 'icons/gynecology.svg',
                            'PDT' => 'icons/boys.svg',
                            'CDG' => 'icons/hearth.svg',
                            default => 'icons/default.svg'
                        };

                        // Si es el último y la cantidad es impar, lo guardamos y lo excluimos de la grid
                        if ($isOdd && $loop->last) {
                            $lastSpecialty = $specialty;
                            continue;
                        }
                    @endphp

                    <button wire:click="selectSpecialty({{ $specialty->id }})"
                            wire:key="specialty-{{ $specialty->id }}"
                            style="
                                background-color: #01BFA5;
                                width: 100%;
                                height: 160px;
                                padding: 1rem 1.5rem;
                                border-radius: 10px;
                                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                gap: 1rem;
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
                        <span style="font-size: 1.8rem; font-weight: 500; text-align: center;">
                            {{ $specialty->name }}
                        </span>
                    </button>
                @endforeach
            </div>

            {{-- Último elemento centrado si la cantidad es impar --}}
            @if ($lastSpecialty)
                <button wire:click="selectSpecialty({{ $lastSpecialty->id }})"
                        wire:key="specialty-{{ $lastSpecialty->id }}"
                        style="
                            background-color: #01BFA5;
                            width: 48%; /* Ajuste manual para que tenga el mismo tamaño */
                            height: 160px;
                            padding: 1rem 1.5rem;
                            border-radius: 10px;
                            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            gap: 1rem;
                            font-size: 1.8rem;
                            font-weight: 500;
                            color: white;
                            transition: background 0.3s, transform 0.2s;
                            margin-top: 1rem;
                        "
                        onmouseover="this.style.backgroundColor='#0fa28e'"
                        onmouseout="this.style.backgroundColor='#01BFA5'"
                        onmousedown="this.style.transform='scale(0.95)'"
                        onmouseup="this.style.transform='scale(1)'">
                    <img src="{{ asset(match($lastSpecialty->internal_code) {
                        'GNC' => 'icons/gynecology.svg',
                        'PDT' => 'icons/boys.svg',
                        'CDG' => 'icons/hearth.svg',
                        default => 'icons/default.svg'
                    }) }}" alt="{{ $lastSpecialty->name }}" style="width: 64px; height: 64px; object-fit: contain;">
                    <span style="font-size: 1.8rem; font-weight: 500; text-align: center;">
                        {{ $lastSpecialty->name }}
                    </span>
                </button>
            @endif
        </div>
    @elseif ($step === 2)
    {{-- Vista de Ingreso de Documento --}}
    <div class="flex flex-col items-center justify-center h-auto min-h-[50vh]">
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
                        width: 50%; /* Ajuste de ancho al 50% */
                        margin: 1.5rem auto 0; /* Centrado horizontalmente */
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
@if ($pdfUrl)
    <iframe id="pdfFrame" src="{{ asset($pdfUrl) }}" style="display:none;"></iframe>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var iframe = document.getElementById("pdfFrame");

            if (iframe) {
                iframe.onload = function () {
                    console.log("PDF cargado, enviando a impresión...");
                    iframe.contentWindow.print();
                };
            } else {
                console.error("El iframe no se encontró.");
            }
        });
    </script>
@endif


</div>
