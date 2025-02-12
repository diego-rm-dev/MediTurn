<div>
    <h2>Crear Especialidad</h2>
    <form wire:submit.prevent="save">
        <label>Nombre:</label>
        <input type="text" wire:model="name">
        
        <label>Tiempo Promedio (min):</label>
        <input type="number" wire:model="time_limit_average">
        
        <label>Código Interno:</label>
        <input type="text" wire:model="internal_code">
        
        <button type="submit">Guardar</button>
    </form>

    @if (session()->has('message'))
        <p style="color: green;">{{ session('message') }}</p>
    @endif
</div>
