<div class="p-6 bg-gray-100">
    <div class="flex justify-between">
        <h2 class=" text-2xl font-bold mb-4">Usuarios</h2>

        <!-- Botón para crear usuario -->
        <div class="mb-4">
            <a href="{{ route('users.create') }}" class="bg-[#01BFA5] text-white px-4 py-2 rounded-lg">
                Crear Usuario
            </a>
        </div>
    </div>

    <!-- Tabla de usuarios -->
    <div class="bg-white p-4 rounded shadow">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 text-left">Nombre</th>
                    <th class="p-2 text-left">Email</th>

                    <th class="p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="border-t">
                    <td class="p-2">{{ $user->name ?? "Sin nombre" }}</td>
                    <td class="p-2">{{ $user->email }}</td>

                    <td class="p-2">
                        <button wire:click="delete({{ $user->id }})" class="text-red-500">Eliminar</button>
                        <button wire:click="edit({{ $user->id }})" class="text-red-500">Editar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>