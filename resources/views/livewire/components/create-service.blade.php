<div>
    <x-jet-button wire:click='create'>
        Añadir Servicio
    </x-jet-button>

    <x-jet-dialog-modal wire:model='create'>

        <x-slot name="title">
            Crear nuevo servicio
        </x-slot>
        <x-slot name="content">
            {!! Form::open() !!}
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <x-jet-label>Categoria:</x-jet-label>
                    {!! Form::select('categoria_id', $categorias, null, ['placeholder' => 'Seleccione una categoria', 'wire:model' => 'categoria_id', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="categoria_id"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Nombre del servicio:</x-jet-label>
                    {!! Form::text('name', null, ['placeholder' => '', 'wire:model' => 'name', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="name"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Slug:</x-jet-label>
                    {!! Form::text('slug', null, ['placeholder' => '', 'wire:model' => 'slug', 'class' => 'form-input', 'disabled']) !!}
                    <x-jet-input-error for="slug"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Descripción:</x-jet-label>
                    {!! Form::text('description', null, ['placeholder' => '', 'wire:model' => 'description', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="description"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Costo:</x-jet-label>
                    {!! Form::number('cost', null, ['placeholder' => '', 'wire:model' => 'cost', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="cost"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Comisión por venta:</x-jet-label>
                    {!! Form::number('comissionforsale', null, ['placeholder' => '', 'wire:model' => 'comissionforsale', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="comissionforsale"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Comisión por realizarlo:</x-jet-label>
                    {!! Form::number('comissionfordoing', null, ['placeholder' => '', 'wire:model' => 'comissionfordoing', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="comissionfordoing"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Precio:</x-jet-label>
                    {!! Form::number('price', null, ['placeholder' => '', 'wire:model' => 'price', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="price"></x-jet-input-error>
                </div>
                <div>
                    <x-jet-label>Estatus:</x-jet-label>
                    {!! Form::select('status', $statusList, null, ['placeholder' => 'Seleccione un status', 'wire:model' => 'status', 'class' => 'form-input']) !!}
                    <x-jet-input-error for="status"></x-jet-input-error>
                </div>

            </div>
            {!! Form::close() !!}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button class="mr-3" wire:click='create'>
                Cancelar
            </x-jet-secondary-button>
            @can('product.store')
                <x-jet-button wire:click='store'>
                    Guardar
                </x-jet-button>
            @endcan

        </x-slot>

    </x-jet-dialog-modal>
</div>
