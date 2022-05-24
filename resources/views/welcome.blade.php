<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="flex flex-col min-h-screen bg-gradient-to-r from-cyan-500 to-blue-500">
        <div class="flex-1 p-4 flex flex-col items-center justify-center">
            <div class="mb-16 md:mb-24">
                <a href="" class="text-5xl font-semibold text-gray-100 tracking-widest">Aula Sastra</a>
            </div>

            <div class="flex flex-wrap items-center justify-center gap-8 xl:gap-12">
                <div>
                    <a href="{{ route('about') }}"
                        class="block p-1 w-32 h-32 rounded-xl font-semibold bg-gray-100 border border-gray-200 ring ring-gray-200 hover:shadow-2xl hover:shadow-cyan-100">
                        <img src="{{ asset('assets/undraw_about_me.svg') }}" alt="" class="h-full w-full">
                    </a>
                    <p
                        class="mt-2 px-2 py-1 rounded bg-gray-50 bg-opacity-30 text-xs font-bold text-sky-800 tracking-wide text-center">
                        Tentang
                    </p>
                </div>

                <div>
                    <a href=""
                        class="block p-1 w-32 h-32 rounded-xl font-semibold bg-gray-100 border border-gray-200 ring ring-gray-200 hover:shadow-2xl hover:shadow-cyan-100">
                        <img src="{{ asset('assets/undraw_newspaper.svg') }}" alt="" class="h-full w-full">
                    </a>
                    <p
                        class="mt-2 px-2 py-1 rounded bg-gray-50 bg-opacity-30 text-xs font-bold text-sky-800 tracking-wide text-center">
                        Berita
                    </p>
                </div>

                <div>
                    <a href="{{ route('artworks.index') }}"
                        class="block p-1 w-32 h-32 rounded-xl font-semibold bg-gray-100 border border-gray-200 ring ring-gray-200 hover:shadow-2xl hover:shadow-cyan-100">
                        <img src="{{ asset('assets/undraw_online_art.svg') }}" alt="" class="h-full w-full">
                    </a>
                    <p
                        class="mt-2 px-2 py-1 rounded bg-gray-50 bg-opacity-30 text-xs font-bold text-sky-800 tracking-wide text-center">
                        Karya
                    </p>
                </div>

                <div>
                    <a href="{{ route('submission') }}"
                        class="block p-1 w-32 h-32 rounded-xl font-semibold bg-gray-100 border border-gray-200 ring ring-gray-200 hover:shadow-2xl hover:shadow-cyan-100">
                        <img src="{{ asset('assets/undraw_online_articles.svg') }}" alt="" class="h-full w-full">
                    </a>
                    <p
                        class="mt-2 px-2 py-1 rounded bg-gray-50 bg-opacity-30 text-xs font-bold text-sky-800 tracking-wide text-center">
                        Kirim Karya
                    </p>
                </div>

                <div>
                    <a href="{{ route('community') }}"
                        class="block p-1 w-32 h-32 rounded-xl font-semibold bg-gray-100 border border-gray-200 ring ring-gray-200 hover:shadow-2xl hover:shadow-cyan-100">
                        <img src="{{ asset('assets/undraw_hey_email.svg') }}" alt="" class="h-full w-full">
                    </a>
                    <p
                        class="mt-2 px-2 py-1 rounded bg-gray-50 bg-opacity-30 text-xs font-bold text-sky-800 tracking-wide text-center">
                        Komunitas
                    </p>
                </div>
            </div>

            <div class="relative w-full max-w-xl focus-within:text-sky-500 mt-16 md:mt-20">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input
                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-sky-300 focus:outline-none focus:shadow-outline-sky form-input"
                    type="text" placeholder="Search for ..." aria-label="Search" />
            </div>

        </div>
    </div>
</body>

</html>
