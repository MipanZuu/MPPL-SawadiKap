<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Malindo') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body style="background-color: #2148C0;">
    <img
      src="pictures/BG.png"
      class="fixed lg:block inset-0 h-full w-full"
      style="z-index: -1;"
    />
    <div class="w-screen h-screen flex flex-col justify-center items-center ">
      <img
        src="pictures/malindo.png"
        class="w-1/4 mb-6"
      />
      <form action="{{route('login.post')}}" method="POST" class="flex flex-col justify-center items-center w-1/2">
      @csrf  
        <div class="relative">
          <i class="fa fa-user text-l m-auto text-black align-items-md-end" style="color: white;"></i>
          <input
          type="text" id="username" name="username" placeholder="Username"
            class="pl-8 border-b-2 rounded-2xl border-primarycolor text-lg"
          />
        </div>
        <div class="relative mt-8">
          <i class="fa fa-lock text-l m-auto text-black align-items-md-end pencet" style="color: white;" onclick="myFunction()"></i>
          <input type="password" id="password" name="password" placeholder="Password"
            class="pl-8 border-b-10 rounded-2xl border-primarycolor text-lg"
          />
        </div >
        <button type="submit" class="mt-10 text-black text-m bg-white w-32 h-10 rounded-full">Log
                        In</button>
      </form>
    </div>
    <div class="text-sm opacity-60 px-22 text-center text-white">
        Sawadikap. All Rights Reserved
    </div>
  </body>


<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

</html>