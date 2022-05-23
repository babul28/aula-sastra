<!DOCTYPE html>
<html :class="{ 'dark': dark }" x-data="adminLayout" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
        @include('admin._layouts._desktop-sidebar')

        @include('admin._layouts._mobile_sidebar')

        <div class="flex flex-col flex-1">

            @include('admin._layouts._header')

            <main class="h-full pb-16 overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
