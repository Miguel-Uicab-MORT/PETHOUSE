<div>
    <x-jet-dropdown width="96" swich="false">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <i class="fas fa-bell"></i>
            </span>
            <span class="relative inline-block cursor-pointer">
                {{ $recordatorios->count() + $citas->count() }}
            </span>
        </x-slot>
        <x-slot name="content">
            <ul>
                @foreach ($citas as $cita)
                    <li class="flex p-2 border-b border-gray-200">
                        <section>
                            <p>
                                {{ $cita->cliente->name }}
                                {{ $cita->servicio->name }}
                            </p>
                            <p>

                                {{Date::parse($cita->scheduled_at)->locale('es')->format('l j F Y') . ' ' . $cita->time }}
                            </p>
                        </section>
                    </li>
                @endforeach
            </ul>
            <ul>
                @foreach ($recordatorios as $recordatorio)
                    <li class="flex p-2 border-b border-gray-200">
                        <section>
                            <p>
                                {{ $recordatorio->cliente->name }}
                                {{ $recordatorio->servicio->name }}
                            </p>
                            <p>
                                {{Date::parse($recordatorio->scheduled_at)->locale('es')->format('l j F Y') . ' ' . $recordatorio->time }}
                            </p>
                        </section>
                    </li>
                @endforeach
            </ul>
        </x-slot>x  
    </x-jet-dropdown>
</div>
