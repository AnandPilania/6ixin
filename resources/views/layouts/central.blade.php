<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('favicon.ico') }}">
        <title>{{ config('app.name', 'Husxl') }}</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        <link href="{{ asset('bladewind/css/bladewind-ui.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/alpha.min.css') }}" rel="stylesheet" />
        <!-- Scripts -->
        <script src="{{ asset('bladewind/js/helpers.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.9.0/cdn.min.js" defer></script>
        @stack('styles')
        @livewireStyles
     </head>
    <body>
       @include('layouts.central.partials.mainNav')

        <div class="font-sans text-gray-900 antialiased min-h-screen">
            {{ $slot }}
        </div>
        @stack('scripts')
        @include('layouts.central.partials.mainFooter')
        @stack('modals')
        @livewireScripts
    </body>
</html>
