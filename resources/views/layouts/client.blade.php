<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="container mx-auto p-4">
        {{ $slot }}  {{-- Aquí se carga la vista de Livewire --}}
    </div>

    @livewireScripts
</body>
</html>
