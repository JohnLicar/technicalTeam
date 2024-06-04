<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Technical Team IS') }}</title>

    <link rel="icon" href="{{ asset('images/Logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="text-gray-900">
    {{-- <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div>
            <a href="/" wire:navigate>
                <x-application-logo class="text-gray-500 fill-current " />
            </a>
        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div> --}}
    <div
        class="flex flex-col items-center justify-center min-h-screen pt-6 bg-cool-gray-500 max-w-screen sm:justify-center sm:pt-0">
        <div class="h-full p-6 ">
            <div class="flex flex-wrap items-center justify-center h-full max-w-5xl lg:justify-between">
                <!-- Left column container with background-->
                <div class="hidden mb-12 md:mb-0 sm:max-w-[60%] lg:w-6/12 sm:block">
                    <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="w-full" alt="Phone image" />
                    <p class="text-4xl font-medium text-white mt-7 sm:text-center">
                        Housing & Technical Information System
                    </p>
                </div>
                <div class="md:w-8/12 lg:ms-6 lg:w-5/12">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>