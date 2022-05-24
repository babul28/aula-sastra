<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Submission Artwork</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body>
    <div class="flex flex-col min-h-screen bg-gray-50">
        <div class="min-h-[25rem] bg-gradient-to-b from-blue-700 to-cyan-500">
            <div class="max-w-7xl mx-auto py-8 flex justify-center items-center h-[19rem]">
                <h1 class="text-5xl text-white font-bold tracking-widest uppercase">Kirim Karya</h1>
            </div>
        </div>

        <div class="flex-1 p-16 max-w-7xl mx-auto bg-gray-50 -mt-24 rounded-xl shadow">
            <p class="text-gray-700 mb-4 leading-loose">
                <strong class="text-2xl">Aula sastra</strong> menerima karya, baik berupa puisi, cerpen, maupun naskah
                teater dan akan diterbitkan setiap satu pekan sekali, tepatnya di akhir pekan. Berikut adalah syarat dan
                ketentuan mengirim karya ke Aula Sastra:
            </p>

            <ol class="list-decimal text-gray-700 space-y-3 ml-12 leading-loose">
                <li>
                    Kirim karya dalam format Ms. Word ke pos elektronik
                    <a href="mailto:sastraaula@gmail.com"
                        class="text-sky-600 hover:text-sky-700 font-semibold">sastraaula@gmail.com</a>
                    dengan menyertakan profil singkat penulis.
                </li>
                <li>
                    Pada judul surat elektronik tulis kategori karya dan judul karya,
                    contoh: Puisi_Lilin.
                </li>
                <li>
                    Karya yang dimuat pada Aula Sastra merupakan tanggung jawab sepenuhnya penulis. Penulis yang
                    karyanya
                    dimuat pada Aula Satra tidak mendapatkan uang, hadiah, dan lain-lain.
                </li>
            </ol>

        </div>
    </div>
</body>

</html>
