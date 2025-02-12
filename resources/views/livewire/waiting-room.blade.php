<div class="p-4 bg-white rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">Sala de Espera</h2>
    
    <ul>
        @foreach ($turns as $turn)
            <li class="p-2 border-b">Turno #{{ $turn->turn_number }} - Paciente: {{ $turn->patient_document }} - Especialidad {{ $turn->specialty->name}}</li>
        @endforeach
    </ul>
</div>
