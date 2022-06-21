<div>
    <x-slot name="header">
        <x-header>
            <x-slot name="view">
                Reportes
            </x-slot>
        </x-header>
    </x-slot>

    <div class="p-3">
        <section x-data="{ type_search: @entangle('type_search') }">

            <div class="flex items-center hidden p-3" :class="{ 'hidden': type_search == 2 }">
                <x-jet-input class="flex-1" wire:model="search" type="text" placeholder="Buscar venta" required
                    autofocus />
                <div class="ml-2">
                    @livewire('components.create-report')
                </div>
            </div>
            <div class="flex items-center hidden p-3" :class="{ 'hidden': type_search == 1 }">
                <x-jet-input class="flex-1" wire:model="search" type="date" placeholder="Buscar venta" required
                    autofocus />
                <div class="ml-2">
                    @livewire('components.create-report')
                </div>
            </div>
            <div class="flex items-center p-3 mb-3 bg-white rounded-lg shadow-lg">
                <div>
                    <label class="mr-2">
                        <input value="1" type="radio" x-model="type_search" name="type_search">
                        <span class="ml-2">
                            {{ __('ID de venta') }}
                        </span>
                    </label>
                    <label class="ml-2">
                        <input value="2" type="radio" x-model="type_search" name="type_search">
                        <span class="ml-2">
                            {{ __('Fecha de venta') }}
                        </span>
                    </label>
                </div>
            </div>
        </section>

        <table class="tables">
            <thead>
                <th>
                    Ticket
                </th>
                <th>
                    Fecha
                </th>
                <th class="hidden md:table-cell">
                    Costo
                </th>
                <th class="hidden md:table-cell">
                    Total
                </th>
                <th class="hidden md:table-cell">
                    Ganancia
                </th>
                @can('reports.print')
                    <th>
                        Ticket
                    </th>
                @endcan
                @can('reports.show')
                    <th>
                        Detalles
                    </th>
                @endcan
                @can('reports.delete')
                    <th>
                        Eliminar
                    </th>
                @endcan
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>
                            {{ $venta->id }}
                        </td>
                        <td>
                            {{ Date::parse($venta->created_at)->locale('es')->format('l j F Y H:i:s') }}
                        </td>
                        <td class="font-bold text-center hidden md:table-cell">
                            <b>$</b>{{ number_format($venta->costo, 2, '.', ',') }}
                        </td>
                        <td class="font-bold text-center hidden md:table-cell">
                            <b>$</b>{{ number_format($venta->total, 2, '.', ',') }}
                        </td>
                        <td class="font-bold text-center hidden md:table-cell">
                            <b>$</b>{{ number_format($venta->ganancia, 2, '.', ',') }}
                        </td>
                        @can('reports.print')
                            <td>
                                <div class="flex justify-center">
                                    <x-btn-print-ticket href="{{ route('print', $venta) }}" target="_blank">
                                        <i class="text-xl fas fa-print"></i>
                                    </x-btn-print-ticket>
                                </div>
                            </td>
                        @endcan
                        @can('reports.show')
                            <td>
                                <div class="flex justify-center">
                                    <x-jet-secondary-button wire:click='show({{ $venta }})'>
                                        <i class="text-xl fas fa-info"></i>
                                    </x-jet-secondary-button>
                                </div>
                            </td>
                        @endcan
                        @can('reports.delete')
                            <td>
                                <div class="flex justify-center">
                                    <x-jet-danger-button wire:click='delete({{ $venta }})'>
                                        <i class="text-xl fas fa-trash"></i>
                                    </x-jet-danger-button>
                                </div>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
