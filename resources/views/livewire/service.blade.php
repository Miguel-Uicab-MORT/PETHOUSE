<div>
    <x-slot name="header">
        <x-header>
            <x-slot name="view">
                Servicios
            </x-slot>
        </x-header>
    </x-slot>
    <div class="container p-3 mx-auto">

        <div class="flex items-center p-3">
            <div class="flex items-center flex-1">
                <x-jet-input class="flex-1" wire:model="search" type="text" placeholder="Buscar servicio"
                    required autofocus />
            </div>
            @can('product.create')
                <div class="ml-2">
                    @livewire('components.create-service')
                </div>
            @endcan
        </div>
        <section x-data="{ type_search: @entangle('type_search') }">
            <div class="flex items-center p-3 mb-3 bg-white rounded-lg shadow-lg">
                <div>
                    <label class="ml-2">
                        <input value="1" type="radio" x-model="type_search" name="type_search">
                        <span class="mr-2">
                            {{ __('ID') }}
                        </span>
                    </label>
                    <label class="ml-2">
                        <input value="2" type="radio" x-model="type_search" name="type_search">
                        <span class="ml-2">
                            {{ __('Nombre') }}
                        </span>
                    </label>
                    <label class="ml-2">
                        <input value="3" type="radio" x-model="type_search" name="type_search">
                        <span class="ml-2">
                            {{ __('Descripción') }}
                        </span>
                    </label>
                </div>
            </div>
        </section>

        <div>
            <table class="w-full tables">
                <thead>
                    <th></th>
                    <th>CATEGORIA</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCIÓN</th>
                    <th>ESTADO</th>
                    <th>PRECIO</th>
                    <th></th>
                </thead>

                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            <td class="text-center">
                                {{ $servicio->id }}
                            </td>
                            <td class="text-center">
                                {{ $servicio->categoria->name }}
                            </td>
                            <td>
                                {{ $servicio->name }}
                            </td>
                            <td>
                                {{ $servicio->description }}
                            </td>
                            <td class="text-center">
                                @switch($servicio->status)
                                    @case(1)
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-green-500 rounded-full">
                                            Activo
                                        </span>
                                    @break

                                    @case(2)
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-white bg-red-800 rounded-full">
                                            Inactivo
                                        </span>
                                    @break

                                    @default
                                @endswitch
                            </td>
                            <td class="font-bold text-center">
                                <b>$</b>{{ number_format($servicio->price, 2, '.', ',') }}
                            </td>
                            <td class="flex justify-end">
                                @can('product.edit')
                                    <x-jet-secondary-button class="ml-1" wire:click='edit({{ $servicio }})'>
                                        <i class="text-xl fas fa-edit"></i>
                                    </x-jet-secondary-button>
                                @endcan
                                @can('product.delete')
                                    <x-jet-danger-button class="ml-1" wire:click='delete({{ $servicio }})'>
                                        <i class="text-xl fas fa-trash"></i>
                                    </x-jet-danger-button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="9">
                            <div class="py-1 text-center">
                                {{ $servicios->links() }}
                            </div>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <x-jet-dialog-modal wire:model='edit'>

            <x-slot name="title">
                Editar servicio
            </x-slot>
            <x-slot name="content">
                {!! Form::open() !!}
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <x-jet-label>Categoria:</x-jet-label>
                        {!! Form::select('ecategoria_id', $categorias, null, ['wire:model' => 'servicio.categoria_id', 'class' => 'form-input']) !!}
                        <x-jet-input-error for="servicio.categoria_id"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Nombre del servicio:</x-jet-label>
                        {!! Form::text('name', null, ['wire:model' => 'servicio.name', 'class' => 'form-input']) !!}
                        <x-jet-input-error for="servicio.name"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Slug:</x-jet-label>
                        {!! Form::text('slug', null, ['wire:model' => 'servicio.slug', 'class' => 'form-input', 'disabled']) !!}
                        <x-jet-input-error for="servicio.slug"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Descripción:</x-jet-label>
                        {!! Form::text('description', null, ['wire:model' => 'servicio.description', 'class' => 'form-input']) !!}
                        <x-jet-input-error for="servicio.description"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Costo:</x-jet-label>
                        {!! Form::number('cost', null, ['wire:model' => 'servicio.cost', 'class' => 'form-input']) !!}
                        <x-jet-input-error for="servicio.cost"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Comisión por venta:</x-jet-label>
                        {!! Form::number('comissionforsale', null, ['wire:model' => 'servicio.comissionforsale', 'class' => 'form-input']) !!}
                        <x-jet-input-error for="servicio.comissionforsale"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Comisión por realizarlo:</x-jet-label>
                        {!! Form::number('comissionfordoing', null, ['wire:model' => 'servicio.comissionfordoing', 'class' => 'form-input']) !!}
                        <x-jet-input-error for="servicio.comissionfordoing"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Precio:</x-jet-label>
                        {!! Form::number('price', null, ['wire:model' => 'servicio.price', 'class' => 'form-input']) !!}
                        <x-jet-input-error for="servicio.price"></x-jet-input-error>
                    </div>
                    <div>
                        <x-jet-label>Estatus:</x-jet-label>
                        {!! Form::select('status', $statusList, null, ['wire:model' => 'servicio.status', 'class' => 'form-input']) !!}
                        <x-jet-input-error for="servicio.status"></x-jet-input-error>
                    </div>

                </div>
                {!! Form::close() !!}
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button class="mr-3" wire:click='edit({{ $servicio }})'>
                    Cancelar
                </x-jet-secondary-button>
                <x-jet-button wire:click='update'>
                    Actualizar
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
    </div>
</div>
