<div>
    <h2>Lista de Especialidades</h2>
    <ul>
        @foreach ($specialties as $specialty)
            <li>{{ $specialty->name }} - Código: {{ $specialty->internal_code }}</li>
        @endforeach
    </ul>
</div>
