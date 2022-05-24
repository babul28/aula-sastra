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
                <div class="absolute top-10 left-0">
                    <a href="{{ count(Request::segments()) === 1 ? route('home') : '/' . Request::segments()[0] }}"
                        class="text-white flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline-block mr-2" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>
                </div>
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
