<div style="display: flex; justify-content: center; gap: 3rem; padding: 3rem;">
    @foreach (['Pediatrics' => $turnsPediatrics, 'Gynecology' => $turnsGynecology, 'Cardiology' => $turnsCardiology] as $specialty => $turns)
    <div style="background-color: #009688; display: flex; flex-direction:column; justify-content: space-between; border-radius: 16px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); padding: 2rem; width: 26rem; color: white;">

        <!-- Ícono de Especialidad -->
        <div style="display: flex; justify-content: center; margin-bottom: 2rem;">
            @if ($specialty == 'Pediatrics')
            <img src="{{ asset('icons/boys.svg') }}" style="width: 3rem; height: 3rem;" alt="Pediatría">
            @elseif ($specialty == 'Gynecology')
            <img src="{{ asset('icons/gynecology.svg') }}" style="width: 3rem; height: 3rem;" alt="Ginecología">
            @elseif ($specialty == 'Cardiology')
            <img src="{{ asset('icons/hearth.svg') }}" style="width: 3rem; height: 3rem;" alt="Cardiología">
            @endif
        </div>

        <!-- Lista de Turnos -->
        <div style="flex: 1; display:flex; flex-direction: column-reverse; gap: 1rem;">
            @foreach ($turns as $turn)
            <div style="display: flex;  justify-content: center; align-items: center; gap:3rem; flex-direction: column-reverse;
                                background-color: {{ $turn->status == 'in_progress' ? '#FFD54F' : '#00897B' }};
                                height: {{ $turn->status == 'in_progress' ? '100px' : 'inherit' }};
                                
                                padding: 1rem; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
                                {{ $turn->status == 'in_progress' ? 'border: 2px solid #FF8F00; font-weight: bold;' : '' }};">
                <span style="font-size: 1.5rem; gap: 3rem;  letter-spacing: 0.5px; color: {{ $turn->status == 'in_progress' ? '#333' : 'white' }};">
                    {{ $turn->turn_number }}
                </span>

            </div>
            @endforeach
        </div>



    </div>
    @endforeach
    <!-- Mensaje de éxito -->
    @if ($flashMessage)
    <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        style="
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            font-size: 1.2rem;
            text-align: center;
            transition: opacity 0.5s ease-in-out;
        ">
        {{ $flashMessage }}
    </div>
    @endif

    <!-- Mensaje de alerta -->
    @if ($alertMessage)
    <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        style="
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgb(234, 34, 34);
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            font-size: 1.2rem;
            text-align: center;
            transition: opacity 0.5s ease-in-out;
        ">
        {{ $alertMessage }}
    </div>
    @endif



</div>