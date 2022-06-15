<div>
    {{-- Controls --}}
    <div class="p-2 mt-5 mb-3 bg-white rounded-lg shadow-lg">
        <div class="flex items-center justify-between">
            <div class="relative z-0 inline-flex shadow-sm">
                <button wire:click="goToPreviousMonth" type="button"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 rounded-l-md hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                    < </button>
                        <button wire:click="goToCurrentMonth" type="button"
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                            Hoy
                        </button>
                        <button wire:click.stop="goToNextMonth" type="button"
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-300 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700">
                            >
                        </button>
                        <button type="button"
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-gray-700 border border-gray-300 rounded-r-md focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100">
                            {{ $startsAt->format('F Y') }}
                        </button>
            </div>

            <x-jet-secondary-button wire:click='create'>
                Agregar cita
            </x-jet-secondary-button>
        </div>
    </div>


    @if ($create == true)
        <x-jet-dialog-modal wire:model='create'>

            <x-slot name="title">
                Nueva Cita
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                    <div>
                        <x-jet-label>Fecha</x-jet-label>
                        {!! Form::date('date', null, ['class' => 'form-input', 'wire:model.lazy' => 'cita.scheduled_at']) !!}
                        <x-jet-input-error for=""></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Hora</x-jet-label>
                        {!! Form::time('time', null, ['class' => 'form-input', 'wire:model.lazy' => 'cita.time']) !!}
                        <x-jet-input-error for="cita.timetime"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Estado</x-jet-label>
                        {!! Form::select('status', $status, null, ['class' => 'form-input', 'wire:model.lazy' => 'cita.status', 'placeholder' => 'Seleccione una opción']) !!}
                        <x-jet-input-error for="cita.status"></x-jet-input-error>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-3 mt-3 sm:grid-cols-2">
                    <div>
                        <x-jet-label>Cliente</x-jet-label>
                        {!! Form::select('clientes', $clientes, null, ['class' => 'form-input', 'wire:model.lazy' => 'cita.cliente_id', 'placeholder' => 'Seleccione una opción']) !!}
                        <x-jet-input-error for="cita.cliente_id"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Servicio</x-jet-label>
                        {!! Form::select('servicios', $servicios, null, ['class' => 'form-input', 'wire:model.lazy' => 'cita.servicio_id', 'placeholder' => 'Seleccione una opción']) !!}
                        <x-jet-input-error for="cita.servicio_id"></x-jet-input-error>
                    </div>
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button class="mr-3" wire:click='create'>
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-button wire:click='store'>
                    Guardar
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    @endif

    @if ($edit == true)
        <x-jet-dialog-modal wire:model='edit'>

            <x-slot name="title">
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-3">
                    <div>
                        <x-jet-label>Fecha</x-jet-label>
                        {!! Form::date('date', null, ['class' => 'form-input', 'wire:model' => 'selectedCita.scheduled_at']) !!}
                        <x-jet-input-error for="selectedCita.scheduled_at"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Hora</x-jet-label>
                        {!! Form::time('time', null, ['class' => 'form-input', 'wire:model' => 'selectedCita.time']) !!}
                        <x-jet-input-error for="selectedCita.time"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Estado</x-jet-label>
                        {!! Form::select('status', $status, null, ['class' => 'form-input', 'wire:model' => 'selectedCita.status', 'placeholder' => 'Seleccione una opción']) !!}
                        <x-jet-input-error for="selectedCita.status"></x-jet-input-error>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-3 mt-3 sm:grid-cols-2">
                    <div>
                        <x-jet-label>Cliente</x-jet-label>
                        {!! Form::select('clientes', $clientes, null, ['class' => 'form-input', 'wire:model' => 'selectedCita.cliente_id', 'placeholder' => 'Seleccione una opción']) !!}
                        <x-jet-input-error for="selectedCita.cliente_id"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Servicio</x-jet-label>
                        {!! Form::select('servicios', $servicios, null, ['class' => 'form-input', 'wire:model' => 'selectedCita.servicio_id', 'placeholder' => 'Seleccione una opción']) !!}
                        <x-jet-input-error for="selectedCita.servicio_id"></x-jet-input-error>
                    </div>
                </div>

            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button class="mr-3" wire:click='edit'>
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-button wire:click.stop="update">
                    Guardar
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    @endif
</div>
