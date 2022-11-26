<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" integrity="sha512-vJu7D5BpjnNXVpLBrl9LKLvmXBNjiLwge8EOZ/YS9XwiChpfKLAlydwIZvoJaDE3LI/kr3goH0MzDzNbBgyoOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<section style="font-family: Montserrat" class=" bg-gray-300 flex font-medium items-center justify-center h-screen">
<section class="w-64 mx-auto bg-profile rounded-2xl px-8 py-6 shadow-xl">
    <div class="flex items-center justify-between">
        <span class="text-white">
            <a href=""><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
          </svg>
        </a>
        </span>
    </div>
    <div class="mt-6 w-fit mx-auto">
        <img src="/pictures/account.png" class="rounded-full w-28 " alt="profile picture" srcset="">
    </div>

    <div class="mt-8 ">
        <h2 class="text-white font-bold text-2xl tracking-wide">{{{Auth::user()->name}}}</h2>
    </div>
    <p class="text-white font-semibold mt-2.5" >
    {{{Auth::user()->username}}}
    </p>
    <div class="mt-8 text-white text-sm">
        <span class="text-gray-400 font-semibold"><a href="{{ URL::previous() }}">Go Back</a></span>
    </div>

</section>
</section>
</body>
</html>