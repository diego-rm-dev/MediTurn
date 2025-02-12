<div>
    <h2>Lista de Turnos</h2>
    <ul>
        @foreach ($turns as $turn)
            <li>
                {{ $turn->turn_number }} - Paciente: {{ $turn->patient_document }}
                - Estado: {{ ucfirst($turn->status) }}
                - Especialidad: {{ $turn->specialty->name }}
            </li>
        @endforeach
    </ul>
</div>
