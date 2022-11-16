<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="icon" href="/pictures/logo cerebrum.png"/>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class=" bg-backgroundCerebrum font-sans">
    <div class="flex gap-x-5 ">
        <div class="flex flex-col w-64 text-backgroundCerebrum bg-white m-4 sidenavheight items-center rounded-3xl p-4">
            <div class="flex text-xl font-semibold pb-10">
                Buku Hijau Cerebrum
            </div>
            <div class="flex w-full justify-center items-center gap-x-5 pb-10">
                <img class="w-20 h-20" src="/pictures/fotoadmin.png" alt="">
                <div class="flex flex-col items-start">
                    <span class="font-semibold">SKP</span>
                    <span>Ormawa</span>
                </div>
            </div>
            
            <!-- Navbar -->
            <nav class="= flex-1 flex flex-col text-backgroundCerebrum items-start gap-y-4 text-sm pr-10">
                <div class="flex gap-x-3"><img class="w-5" src="/pictures/iconkegiatan.png" alt=""><a class="" href="">Kegiatan Ormawa</a></div>
                
                <div class="flex gap-x-3"><img class="w-5" src="/pictures/iconnilai.png" alt=""><a class="" href="">Penilaian</a></div>
                
            </nav>
            <div class="flex items-center justify-start w-full px-4 gap-x-5">
                <img src="/pictures/logout_gray.png" class="w-10" alt="">
                Log Out
            </div>
        </div>
        <div class="w-full flex-1">
            @yield('content')
        </div>
    </div>


    <script>
        window.addEventListener('DOMContentLoaded', () => {
        const manabtn = document.querySelector('#manajemen')
        const mana = document.querySelector('#dropmanajemen')
        const nilaibtn = document.querySelector('#nilai')
        const nilai = document.querySelector('#dropnilai')
        manabtn.addEventListener('click', () => {
            mana.classList.toggle('hidden');
            mana.classList.toggle('flex');

        })
        nilaibtn.addEventListener('click', () => {
            nilai.classList.toggle('hidden');
            nilai.classList.toggle('flex');

        })

    })
    </script>
</body>