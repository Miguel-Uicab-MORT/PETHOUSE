<div>
    <x-jet-button wire:click='create'>
        Corte de caja
    </x-jet-button>

    <x-jet-dialog-modal wire:model='create'>

        <x-slot name="title">
            Corte de caja
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-4 gap-3">

                {!! Form::label('total', ' ', ['class' => 'font-bold text-sm text-center']) !!}
                {!! Form::label('total', 'Contado', ['class' => 'font-bold text-sm text-center']) !!}
                {!! Form::label('total', 'Calculado', ['class' => 'font-bold text-sm text-center']) !!}
                {!! Form::label('total', 'Diferencia', ['class' => 'font-bold text-sm text-center']) !!}

                {!! Form::label('total', 'Efectivo', ['class' => 'font-bold text-sm text-center']) !!}
                <x-jet-input class="flex-1" type="number" wire:model='c_Efectivo' required autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='tEfectivo' required disabled autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='dEfectivo' required disabled autofocus />

                {!! Form::label('total', 'Tarjeta', ['class' => 'font-bold text-sm text-center']) !!}
                <x-jet-input class="flex-1" type="number" wire:model='c_Tarjeta' required autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='tTarjeta' required disabled autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='dTarjeta' required disabled autofocus />

                {!! Form::label('total', 'Total', ['class' => 'font-bold text-sm text-center']) !!}
                <x-jet-input class="flex-1" type="number" wire:model='c_Total' required disabled autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='tTotal' required disabled autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='dTotal' required disabled autofocus />

            </div>

            <h1 class="text-center font-bold">
                Retiro por corte
            </h1>

            <div class="grid grid-cols-4 gap-3">

                {!! Form::label('total', 'Efectivo', ['class' => 'font-bold text-sm text-center']) !!}
                {!! Form::label('total', 'Tarjeta', ['class' => 'font-bold text-sm text-center']) !!}
                {!! Form::label('total', 'Total', ['class' => 'font-bold text-sm text-center']) !!}
                {!! Form::label('total', 'Caja', ['class' => 'font-bold text-sm text-center']) !!}

                <x-jet-input class="flex-1" type="number" wire:model='r_Efectivo' required autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='r_Tarjeta' required autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='rTotal' required disabled autofocus />
                <x-jet-input class="flex-1" type="number" wire:model='caja' required disabled autofocus />


            </div>

        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click='store'>
                Hacer corte
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>
