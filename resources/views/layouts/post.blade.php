<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="flex flex-col min-h-screen bg-gray-50">
        <div class="relative px-4 min-h-[25rem] bg-gradient-to-b from-blue-700 to-cyan-500">
            @if($featuredImage)
            <div class="absolute bg-cover inset-0" style="background-image: url('{{ $featuredImage }}')">
            </div>
            <div class="absolute bg-gradient-to-b from-blue-700 to-cyan-500 opacity-80 inset-0">
            </div>
            @endif
            <div class="relative z-10 max-w-7xl mx-auto py-8 flex justify-center items-center h-[19rem]">
                <h1 class="text-5xl text-white font-bold tracking-widest uppercase text-center overflow-hidden">
                    {{ $header }}
                </h1>
            </div>
        </div>

        <div class="relative flex-1 px-4 xl:px-0 w-full max-w-7xl mx-auto">
            <div class="p-6 md:p-8 lg:p-16 bg-gray-50 -mt-24 rounded-t-xl shadow">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
