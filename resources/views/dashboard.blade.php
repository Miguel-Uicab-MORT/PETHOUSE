<x-app-layout>
        <x-slot name="header">
            <div class="flex items-center justify-end md:justify-between">
                <h2 class="hidden sm:block text-xl font-semibold leading-tight text-gray-800">
                    Bienvenido, {{ Auth::user()->name }}
                </h2>
                <!-- Settings Dropdown -->
                <div class="flex items-center">
                    <div>
                        @livewire('components.dropdown-alert')
                    </div>

                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                    <img class="object-cover w-8 h-8 mr-2 rounded-full"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                        aria-hidden="true" />
                                    {{ Auth::user()->name }}

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Opciones') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            <div class="border-t border-gray-100"></div>

                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>
        </x-slot>

    <div class="grid max-h-screen grid-cols-1 gap-1 mt-6 sm:grid-cols-3 lg:grid-cols-5 sm:gap-3 lg:gap-6">
        <!-- Punto de venta -->
        @can('pointsale.create')
            <a href="{{ route('pointsale.create') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/point-sale.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Punto de venta
                        </h1>
                    </div>
                </div>
            </a>
        @endcan
        <!-- Categorias -->
        @can('category.index')
            <a href="{{ route('category.index') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/categories.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Categorias
                        </h1>
                    </div>
                </div>
            </a>
        @endcan
        <!-- Inventario -->
        @can('inventory.index')
            <a href="{{ route('inventory.index') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/inventory.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Inventario
                        </h1>
                    </div>
                </div>
            </a>
        @endcan
        <!-- Servicios -->
        @can('service.index')
            <a href="{{ route('service.index') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/services.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Servicios
                        </h1>
                    </div>
                </div>
            </a>
        @endcan
        <!-- Calendario -->
        @can('roles.index')
            <a href="{{ route('calendar.index') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/calendar.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Calendario
                        </h1>
                    </div>
                </div>
            </a>
        @endcan
        <!-- Reportes -->
        @can('reports.index')
            <a href="{{ route('reports.index') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/reports.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Reportes
                        </h1>
                    </div>
                </div>
            </a>
        @endcan
        <!-- Clientes -->
        @can('client.index')
            <a href="{{ route('client.index') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/clients.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Clientes
                        </h1>
                    </div>
                </div>
            </a>
        @endcan
        <!-- Empleados -->
        @can('users.index')
            <a href="{{ route('users.index') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/empleados.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Empleados
                        </h1>
                    </div>
                </div>
            </a>
        @endcan
        <!-- Roles -->
        @can('roles.index')
            <a href="{{ route('roles.index') }}">
                <div class="p-3 bg-white rounded-lg shadow-xl hover:bg-gray-300">
                    <div class="flex justify-center">
                        <img src="/img/roles.png" class="object-cover w-40" alt="">
                    </div>
                    <div>
                        <h1 class="text-xl font-semibold leading-tight text-center text-gray-800">
                            Roles
                        </h1>
                    </div>
                </div>
            </a>
        @endcan


        <div>
            <x-btn-logout>Salir</x-btn-logout>
        </div>
    </div>
</x-app-layout>
