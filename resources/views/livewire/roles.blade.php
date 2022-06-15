<div>
    <x-slot name="header">
        <x-header>
            <x-slot name="view">
                Roles
            </x-slot>
        </x-header>
    </x-slot>
    <div class="bg-gray-100">
        <div class="py-3">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 gap-3 md:grid-cols-2 md:gap-5 lg:gap-8">

                    <div class="p-3 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <div class="flex flex-col">

                            <h2 class="mb-3 text-xl font-bold text-center ">
                                Lista de roles
                            </h2>

                            <table class="w-full tables">
                                <thead>
                                    <th>Nombre</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $role)
                                        <tr>
                                            <td>
                                                {{ $role->name }}
                                            </td>
                                            <td class="flex justify-end">
                                                <x-jet-secondary-button class="mr-2">
                                                    Editar
                                                </x-jet-secondary-button>
                                                <x-jet-danger-button wire:click='delete({{ $role->id }})'>
                                                    Eliminar
                                                </x-jet-danger-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="p-3 overflow-hidden bg-white shadow-xl sm:rounded-lg">
                        <div class="flex flex-col">

                            <x-jet-input class="flex-1 mb-3" type="text" autofocus
                                placeholder="Ingresa nombre del nuevo rol" wire:model='name'></x-jet-input>
                            <x-jet-input-error for="name"></x-jet-input-error>


                            <h2 class="mb-3 text-xl font-bold text-center ">
                                Selecciones permisos para el nuevo rol
                            </h2>

                            <div class="flex-grow overflow-auto">

                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    @foreach ($permissions as $permission)
                                        <div class="">
                                            <div>
                                                <label>
                                                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1 rounded', 'wire:model' => 'permisos']) !!}
                                                    {{ $permission->description }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-center mt-5">
                                    <x-jet-button wire:click='Store'>
                                        Crear rol
                                    </x-jet-button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
