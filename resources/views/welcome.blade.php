<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Roboto&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="antialiased">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100  sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    @can('dashboard')
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 hover:text-gray-900 font-bold">Punto de
                            venta</a>
                    @endcan
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-gray-900 font-bold">Iniciar
                        Sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 hover:text-gray-900 font-bold">Registrar</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h2 class=" text-center text-2xl font-bold text-gray-800">¡Bienvenido a PETHOUSE!</h2>

            <div class="flex justify-center items-center">
                <img class="object-cover w-60" src="/img/logo.png">
            </div>
        </div>
    </div>
</body>

</html>
