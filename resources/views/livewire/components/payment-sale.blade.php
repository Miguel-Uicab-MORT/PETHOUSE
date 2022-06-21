<div>
    <x-jet-button wire:click='paymentModal'>
        Pagar
    </x-jet-button>

    <x-jet-dialog-modal wire:model='paymentModal'>
        <x-slot name="title">
            Pago
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2">
                {!! Form::label('total', 'Total a pagar $:', ['class' => 'strong mr-3 text-right']) !!}
                <x-jet-input class="flex-1" type="text" wire:model='subtotal' required disabled autofocus />
            </div>
            <div class="grid grid-cols-2 mt-3">
                {!! Form::label('r_Efectivo', 'Pago en efectivo $:', ['class' => 'strong mr-3 text-right']) !!}
                <div>
                    <x-jet-input class="w-full" wire:model="r_Efectivo" type="number" placeholder="Recibi" required
                        autofocus />
                    <x-jet-input-error for="r_Efectivo"></x-jet-input-error>
                </div>
            </div>
            <div class="grid grid-cols-2 mt-3">
                {!! Form::label('r_Tarjeta', 'Pago con tarjeta $:', ['class' => 'strong mr-3 text-right']) !!}
                <div>
                    <x-jet-input class="w-full" wire:model="r_Tarjeta" type="number" placeholder="Recibi" required
                        autofocus />
                    <x-jet-input-error for="r_Tarjeta"></x-jet-input-error>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click='paymentModal'>
                Cancelar
            </x-jet-secondary-button>
            @if ($r_Total < $subtotal)
                <x-jet-button class="ml-1" wire:click='paymentSale' disabled>
                    Cobrar
                </x-jet-button>
            @else
                <x-jet-button class="ml-1" wire:click='paymentSale'>
                    Cobrar
                </x-jet-button>
            @endif
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model='cambioModal'>
        <x-slot name="title">
            Detalles
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-2">
                {!! Form::label('total', 'Total a pagar $:', ['class' => 'strong mr-3 text-right']) !!}
                <x-jet-input class="flex-1" type="text" wire:model='subtotal' required disabled autofocus />
            </div>

            <div class="grid grid-cols-2 mt-3">
                {!! Form::label('recibido', 'Recibido:', ['class' => 'strong mr-3 text-right']) !!}
                <x-jet-input type="number" value="{{ $recibido }}" disabled autofocus></x-jet-input>
            </div>
            <div class="grid grid-cols-2 mt-3">
                {!! Form::label('total', 'Cambio', ['class' => 'strong mr-3 text-right']) !!}
                <x-jet-input type="number" value="{{ $cambio }}" disabled autofocus></x-jet-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            @if ($ventaid != null)
            <x-btn-print-ticket href="{{ route('print', $ventaid) }}" target="_blank">
                <i class="text-xl fas fa-print"></i>
            </x-btn-print-ticket>
            @endif
            <x-jet-button wire:click='cambioModal'>
                Finalizar
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
