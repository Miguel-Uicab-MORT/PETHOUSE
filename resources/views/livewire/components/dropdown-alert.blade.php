<div>
    <x-jet-dropdown width="96" swich="false">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <i class=" text-gray-500 fas fa-bell"></i>
            </span>
            <span class="relative inline-block cursor-pointer">
                {{ $recordatorios->count() + $citas->count() }}
            </span>
        </x-slot>
        <x-slot name="content">
            <ul>
                @forelse ($citas as $cita)
                    <li class="flex p-2 border-b border-gray-200">
                        <section>
                            <p>
                                {{ $cita->cliente->name }}
                                {{ $cita->servicio->name }}
                            </p>
                            <p>

                                {{ Date::parse($cita->scheduled_at)->locale('es')->format('l j F Y') .' ' .$cita->time }}
                            </p>
                        </section>
                    </li>
                @empty
                <section class=" font-bold text-gray-800 text-center ">
                    Por el momento no hay citas pendientes para hoy.
                </section>
                @endforelse
            </ul>
            <ul>
                @forelse ($recordatorios as $recordatorio)
                    <li class="flex p-2 border-b border-gray-200">
                        <section>
                            <p>
                                {{ $recordatorio->cliente->name }}
                                {{ $recordatorio->servicio->name }}
                            </p>
                            <p>
                                {{ Date::parse($recordatorio->scheduled_at)->locale('es')->format('l j F Y') .' ' .$recordatorio->time }}
                            </p>
                        </section>
                    </li>
                @empty
                <li class="flex p-2 border-b border-gray-200">
                    <section class=" font-bold text-gray-800 text-center ">
                        Por el momento no hay citas por confirmar.
                    </section>
                </li>
                @endforelse
            </ul>
        </x-slot>
    </x-jet-dropdown>
</div>
