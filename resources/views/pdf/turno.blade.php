<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Turno Generado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .ticket {
            width: 80mm; /* Tamaño de ancho fijo */
            max-width: 80mm;
            padding: 10px;
            border: 1px solid black;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h2>Turno Generado</h2>
        <p><strong>Número de Turno:</strong> {{ $turn_number }}</p>
        <p><strong>Documento:</strong> {{ $patient_document }}</p>
        <p><strong>Especialidad:</strong> {{ $specialty }}</p>
        <p>¡Gracias por su visita!</p>
    </div>
</body>
</html>
