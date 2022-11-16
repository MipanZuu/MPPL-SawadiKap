<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" integrity="sha512-vJu7D5BpjnNXVpLBrl9LKLvmXBNjiLwge8EOZ/YS9XwiChpfKLAlydwIZvoJaDE3LI/kr3goH0MzDzNbBgyoOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="icon" href="/pictures/logo cerebrum.png"/>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
  <div class="flex">
    <div class="flex flex-col space-y-5 justify-between min-h-screen w-60 px-2 py-4 bg-gray-50 h-screen sticky top-0">
      <div class=" flex items-center justify-between text-gray-600 text-3xl px-5 ml-3"><b>Buku Hijau Cerebrum</b></div>

      <div class="flex flex-col flex-auto">
        <div class="items-center ml-10">
      <img src="/pictures/avatar.svg" class="w-20" alt="">
      <div class="font-bold text-black-500 text-lg">
            {{{Auth::user()->nama}}}
        </div>
        <div class="text-orangeCerebrum text-md font-semibold italic">
            Ormawa
        </div>
    </div>
    @yield('content')
    </div>
  </div>
</html>