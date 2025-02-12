<div class="p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-bold mb-4">Actualizar Usuario</h2>

    @if (session()->has('message'))
    <div class="p-2 mb-2 text-green-600 bg-green-100 rounded">
        {{ session('message') }}
    </div>
    @endif

    <form wire:submit.prevent="update">
        <div class="mb-4">
            <label for="name" class="block font-medium">Nombre</label>
            <input type="text" id="name" wire:model="name" class="w-full border-gray-300 rounded-lg p-2">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Correo Electrónico</label>
            <input type="email" id="email" wire:model="email" class="w-full border-gray-300 rounded-lg p-2">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium">Nueva Contraseña (opcional)</label>
            <input type="password" id="password" wire:model="password" class="w-full border-gray-300 rounded-lg p-2">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-[#01BFA5] text-white py-2 px-4 rounded-lg">Actualizar Usuario</button>
    </form>
</div>