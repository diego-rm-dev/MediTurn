<div class="p-6 bg-white rounded-lg shadow-md h-screen flex flex-col justify-center items-center">
    @if ($step === 1)
        {{-- Vista de Selección de Especialidad --}}
        <h2 class="text-xl font-bold mb-6 text-center">Selecciona Departamento</h2>

        <div class="w-full max-w-3xl flex flex-col items-center space-y-6">
            <div class="grid grid-cols-2 gap-6 w-full">
                {{-- Cardiología --}}
                <button wire:click="selectSpecialty(1)"
                        class="text-white h-40 w-full px-6 py-4 rounded-lg shadow hover:bg-teal-600 flex flex-col items-center justify-center space-y-2"
                        style="background-color: #01BFA5;">
                    <img src="{{ asset('icons/icono-1.svg') }}" alt="Cardiología" class="w-5 h-5 object-contain">
                    <span class="text-lg font-semibold">Cardiología</span>
                </button>

                {{-- Ginecología --}}
<button wire:click="selectSpecialty(2)"
        class="w-full text-white rounded-3xl px-6 py-8 flex items-center gap-4 hover:bg-teal-600 transition-colors shadow-md"
        style="background-color: #01BFA5; min-height: 80px;">
    <div class="bg-white/10 p-2 rounded-xl ml-4">
        <img src="{{ asset('icons/icono-2.svg') }}" alt="Ginecología" style={width=200px; height=100px}>
    </div>
    <span class="text-xl font-medium">Ginecología</span>
</button>
            </div>

            {{-- Pediatría --}}
            <button wire:click="selectSpecialty(3)"
                    class="text-white h-40 w-full px-6 py-4 rounded-lg shadow hover:bg-teal-600 flex flex-col items-center justify-center space-y-2 max-w-lg"
                    style="background-color: #01BFA5;">
                <img src="{{ asset('icons/icono-3.svg') }}" alt="Pediatría" class="w-5 h-5 object-contain">
                <span class="text-lg font-semibold">Pediatría</span>
            </button>
        </div>
    @elseif ($step === 2)
        {{-- Vista de Ingreso de Documento --}}
        <h2 class="text-xl font-bold mb-4 text-center">Ingresa tu número de documento</h2>
        <div class="flex flex-col items-center">
            <input type="text" wire:model="patientDocument"
                   class="w-3/4 border border-gray-300 rounded-md px-3 py-2 focus:ring-teal-500 focus:border-teal-500">
            @error('patientDocument') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

            <button wire:click="generateTurn"
                    class="mt-4 bg-[#01BFA5] text-white px-6 py-2 rounded-md hover:bg-teal-600">
                Generar Turno
            </button>

            @if (session()->has('message'))
                <div class="mt-4 text-green-700 font-semibold">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    @endif
</div>
