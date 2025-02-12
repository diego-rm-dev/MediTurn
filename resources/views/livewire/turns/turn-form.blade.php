<div class="p-4 bg-white rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Crear Turno</h2>

    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-2 mb-2 rounded">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="space-y-4">
        <div>
            <label class="block text-gray-700 font-medium">Número de Turno:</label>
            <input type="text" wire:model="turn_number" 
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            @error('turn_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Documento del Paciente:</label>
            <input type="text" wire:model="patient_document" 
                   class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            @error('patient_document') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Especialidad:</label>
            <select wire:model="specialty_id" 
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="">Seleccione una especialidad</option>
                @foreach ($specialties as $specialty)
                    <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                @endforeach
            </select>
            @error('specialty_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Estado:</label>
            <select wire:model="status" 
                    class="w-full border border-gray-300 rounded-md px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="pending">Pendiente</option>
                <option value="in_progress">En Proceso</option>
                <option value="finished">Finalizado</option>
                <option value="cancelled">Cancelado</option>
            </select>
            @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Guardar Turno
        </button>
    </form>
</div>
