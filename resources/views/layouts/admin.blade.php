<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" integrity="sha512-vJu7D5BpjnNXVpLBrl9LKLvmXBNjiLwge8EOZ/YS9XwiChpfKLAlydwIZvoJaDE3LI/kr3goH0MzDzNbBgyoOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>

<body>
  <div class="flex">
    <div class="flex flex-col space-y-5 justify-between min-h-screen w-40 px-2 py-4 bg-gray-100 h-screen sticky top-0 rounded-r-3xl">
      <div class=" flex items-center justify-between text-gray-600 text-3xl px-5 ml-3"><b></b></div>

      <div class="flex flex-col flex-auto">
        <div class="items-center ml-10">
      <div class="font-bold text-black-500 text-lg">
            <!-- {{{Auth::user()->nama}}} -->
        </div>
        <div class="text-orangeCerebrum text-md font-semibold italic">
            
        </div>
    </div>
    @yield('content')
    </div>
  </div>
</html>