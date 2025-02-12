<div class="p-6 bg-gray-100">
    <h2 class="text-2xl font-bold mb-4">Editar Usuario</h2>

    @if (session()->has('message'))
    <div class="text-green-500">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="updateUser">
        <label class="block">Nombre:</label>
        <input type="text" wire:model="name" class="border p-2 w-full">

        <label class="block mt-2">Email:</label>
        <input type="email" wire:model="email" class="border p-2 w-full">

        <label class="block mt-2">Rol:</label>
        <select wire:model="role" class="border p-2 w-full">
            <option value="admin">Admin</option>
            <option value="user">Usuario</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4">Actualizar</button>
    </form>
</div>