<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.4.6/tailwind.min.css" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    
    <link rel="icon" href="/pictures/logo cerebrum.png"/>


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<div class="flex-auto">
      <div class="flex flex-col">
        <div class="flex bg-teal-300 h-24 p-2 shadow-xl justify-between sticky z-10">
          <div class="flex flex-col space-x-3 pt-6">
          <ul class="text-gray-700 sm:self-center text-xl border-t sm:border-none">
        <li class="sm:inline-block">
          <a href="{{route('petunjuk')}}" class="p-3 hover:text-green-700">Petunjuk Umum</a>
        </li>
        <li class="sm:inline-block">
          <a href="/" class="p-3 hover:text-green-700">Rapor Kaderisasi</a>
        </li>
            

          </div>
          <div class="w-30 h-30">
          <img class="object-contain h-20" src="pictures/logo cerebrum.png" alt="">
        </div>
        </div>
        
    <div class="bg-white min-h-screen align-items-lg-start">
    <div class="bg-white rounded-xl p-10 relative">
            @yield('content')
    </div>
<div class="text-sm opacity-50 px-22 text-center mt-96">
        TCenayang 2022. All Rights Reserved
    </div>
</div>
</div>