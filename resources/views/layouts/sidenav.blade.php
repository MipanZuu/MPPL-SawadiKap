<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/0.0.0-insiders.4a070ac/tailwind.min.css" integrity="sha512-vJu7D5BpjnNXVpLBrl9LKLvmXBNjiLwge8EOZ/YS9XwiChpfKLAlydwIZvoJaDE3LI/kr3goH0MzDzNbBgyoOQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="icon" href="/pictures/logo cerebrum.png"/>


    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body id="body" class="">
    @if(!Auth::check())
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

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>

    <body class="">
        @yield('content')
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
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const editbtn = document.getElementsByClassName('editbtn')
                const edit = document.getElementsByClassName('editdropdown')
                const editclose = document.getElementsByClassName('closeedit')
                const tambahbtn = document.querySelector('#tambahbtn')
                const tambahoverlay = document.querySelector('#tambahoverlay')
                const closeoverlay = document.querySelector('#closeoverlaybtn')
                const uploadbtn = document.querySelector('#uploadbtn')
                const uploadoverlay = document.querySelector('#uploadoverlay')
                const closeuploadoverlay = document.querySelector('#closeuploadoverlaybtn')
                const body = document.querySelector('#body')
                for (let i = 0; i < editbtn.length; i++) {
                    editbtn[i].onclick = function () {
                        edit[i].style.display = "block";
                    }
                }
                for (let i = 0; i < editclose.length; i++) {
                    editclose[i].onclick = function () {
                        edit[i].style.display = "none";
                    }
                }
                editbtn.addEventListener('click', () => {
                    edit.classList.toggle('hidden');
                    edit.classList.toggle('flex');
                })
                editclose.addEventListener('click', () => {
                    edit.classList.toggle('hidden');
                    edit.classList.toggle('flex');
                })
                tambahbtn.addEventListener('click', () => {
                    tambahoverlay.classList.toggle('hidden');
                    tambahoverlay.classList.toggle('flex');
                    body.classList.toggle('overflow-hidden');
                })
                closeoverlay.addEventListener('click', () => {
                    tambahoverlay.classList.toggle('hidden');
                    tambahoverlay.classList.toggle('flex');
                    body.classList.remove('overflow-hidden');

                })
                uploadbtn.addEventListener('click', () => {
                    uploadoverlay.classList.toggle('hidden');
                    uploadoverlay.classList.toggle('flex');
                })
                closeuploadoverlay.addEventListener('click', () => {
                    uploadoverlay.classList.toggle('hidden');
                    uploadoverlay.classList.toggle('flex');

                })
            })
            $(document).ready(function () {
                $('.select2').select2();
            });

        </script>
    </body>



    @elseif(Auth::user()->role == 'Super User')
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
            {{{Auth::user()->role}}}
        </div>
    </div>
    <div class="p-2 hover:bg-pink-100">
          <div class="flex flex-row space-x-3 mt-5">
            
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-700" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <!-- <h4 class="font-bold text-gray-500 hover:text-pink-600 ">Manajemen Mahasiswa</h4> -->
            
            <a href="{{route('listmahasiswa')}}" class="text-gray-500 hover:text-pink-600">
                    Manajemen Mahasiswa
            </a>
          </div>
        </div>

        <button id="listuser">
        <div class="p-2 hover:bg-pink-100 ">
          <div class="flex flex-row space-x-3 ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500 " viewBox="0 0 20 20"
              fill="currentColor">
              <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
            </svg>
            <h4 class="font-regular text-gray-500 hover:text-pink-600">Manajemen User</h4>
            <div class="w-4 mt-1">
                <img src="/pictures/dropdown.png" alt="">
            </div>
        </div>
        </div>
        </button>
        <div id="droplistuser" class="hidden flex-col pl-11 text-lg">
            <a href="{{route('listUser')}}" class="pb-4">
                <h4 class="font-regular text-gray-500 hover:text-pink-600 text-sm">List User</h4>
            </a>
            <a href="{{route('listpanitia')}}" class="pb-4">
            <h4 class="font-regular text-gray-500 hover:text-pink-600 text-sm">List Panitia</h4>
            </a>
            <a href="{{route('listormawa')}}" class="pb-4">
            <h4 class="font-regular text-gray-500 hover:text-pink-600 text-sm">List Ormawa</h4>
            </a>
        </div>


        <button id="listkegiatan">
        <div class="p-2 hover:bg-pink-100">
          <div class="flex flex-row space-x-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-500" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
            </svg>
            <h4 class="font-regular text-gray-500 hover:text-pink-600">Kegiatan</h4>
            <div class="w-4 mt-1">
                <img src="/pictures/dropdown.png" alt="">
            </div>  
        </div>
        </div>
        </button>
        <div id="droplistkegiatan" class="hidden flex-col pl-11 text-lg">
            <a href="{{route('listtahap')}}" class="pb-4">
                <h4 class="font-regular text-gray-500 hover:text-pink-600 text-sm">Manajemen Kegiatan</h4>
            </a>
            <a href="{{route('listdivisi')}}" class="pb-4">
            <h4 class="font-regular text-gray-500 hover:text-pink-600 text-sm">List Divisi</h4>
            </a>
            <a href="{{route('listkegiatanpanitia')}}" class="pb-4">
            <h4 class="font-regular text-gray-500 hover:text-pink-600 text-sm">List Kegiatan</h4>
            </a>
        </div>
      

      <div class="flex flex-col mt-10">
      <a href="{{route('admin')}}">
      <div class="flex justify-center mt-2">
                <button class="text-white text-xs bg-blue-300 w-24 h-7 rounded-full">
                    Home
                </button>
            </div> 
      <a href="{{route('uploadpetunjuk')}}">
            <div class="flex justify-center mt-2">
                <button class="text-white text-xs bg-green-500 w-24 h-7 rounded-full">
                    Upload
                </button>
            </div>
        </a>
        <form action="{{route('backup')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-2">
                <button type="submit"
                    class="text-white text-xs bg-backgroundCerebrum w-24 h-7 rounded-full">Backup</button>
            </div>
        </form>
        <form action="{{route('logout.post')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-2">
                <button type="submit"
                    class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Logout</button>
            </div>
        </form>
        <div class="text-sm opacity-30 px-22 text-center mt-96">
        TCenayang 2022. All Rights Reserved
    </div>
      </div>
    </div>
    </div>


    <div class="flex-auto">
      <div class="flex flex-col">
        <div class="flex bg-white h-24 p-2 drop-shadow-2xl justify-between sticky top-0 z-10">
          <div class="flex flex-col space-x-3">

            

          </div>
          <div class="w-20 h-20">
            <img src="/pictures/logo_unair.png" alt="Logo Unair <3">
        </div>
        </div>
        
        <div class="bg-blue-50 min-h-screen align-items-lg-start">
          <div class="grid lg:grid-cols-3 sm:grid-cols-2 p-4 gap-10">
            <!--Grid starts here-->
            
            <!-- Grid ends here..-->

          </div>
    <div class="p-10">
    <div class="bg-white rounded-xl p-10 relative">
            @yield('content')
    </div>
</div>
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
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const nilaibtn = document.querySelector('#listuser')
            const nilai = document.querySelector('#droplistuser')
            nilaibtn.addEventListener('click', () => {
                nilai.classList.toggle('hidden');
                nilai.classList.toggle('flex');
            })
        })

    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const nilaibtn = document.querySelector('#listkegiatan')
            const nilai = document.querySelector('#droplistkegiatan')
            nilaibtn.addEventListener('click', () => {
                nilai.classList.toggle('hidden');
                nilai.classList.toggle('flex');
            })
        })

    </script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const editbtn = document.getElementsByClassName('editbtn')
            const edit = document.getElementsByClassName('editdropdown')
            const editclose = document.getElementsByClassName('closeedit')
            const tambahbtn = document.querySelector('#tambahbtn')
            const tambahoverlay = document.querySelector('#tambahoverlay')
            const closeoverlay = document.querySelector('#closeoverlaybtn')
            const uploadbtn = document.querySelector('#uploadbtn')
            const uploadoverlay = document.querySelector('#uploadoverlay')
            const closeuploadoverlay = document.querySelector('#closeuploadoverlaybtn')
            const body = document.querySelector('#body')
            for (let i = 0; i < editbtn.length; i++) {
                editbtn[i].onclick = function () {
                    edit[i].style.display = "block";
                }
            }
            for (let i = 0; i < editclose.length; i++) {
                editclose[i].onclick = function () {
                    edit[i].style.display = "none";
                }
            }
            editbtn.addEventListener('click', () => {
                edit.classList.toggle('hidden');
                edit.classList.toggle('flex');
            })
            editclose.addEventListener('click', () => {
                edit.classList.toggle('hidden');
                edit.classList.toggle('flex');
            })
            tambahbtn.addEventListener('click', () => {
                tambahoverlay.classList.toggle('hidden');
                tambahoverlay.classList.toggle('flex');
                body.classList.toggle('overflow-hidden');
            })
            closeoverlay.addEventListener('click', () => {
                tambahoverlay.classList.toggle('hidden');
                tambahoverlay.classList.toggle('flex');
                body.classList.remove('overflow-hidden');

            })
            uploadbtn.addEventListener('click', () => {
                uploadoverlay.classList.toggle('hidden');
                uploadoverlay.classList.toggle('flex');
            })
            closeuploadoverlay.addEventListener('click', () => {
                uploadoverlay.classList.toggle('hidden');
                uploadoverlay.classList.toggle('flex');

            })
        });
    </script>
    @elseif(Auth::user()->role == 'Ormawa')
    
        <!DOCTYPE html>
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <div class="p-2 hover:bg-pink-100">
        <div class="flex flex-row space-x-3 mt-5">
            
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-700" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <!-- <h4 class="font-bold text-gray-500 hover:text-pink-600 ">Manajemen Mahasiswa</h4> -->
            
            <a href="{{route('listmhsormawa')}}" class="text-gray-500 hover:text-pink-600">
                    Alokasi Mahasiswa
            </a>
            </div>
        </div>
        <div class="p-2 hover:bg-pink-100">
            <div class="flex flex-row space-x-3 mt-5">
            
            <span class="material-symbols-outlined h-6 w-6 text-pink-700" fill="none" viewBox="0 0 24 24">
            ballot
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </span>
            <!-- <h4 class="font-bold text-gray-500 hover:text-pink-600 ">Manajemen Mahasiswa</h4> -->
            
            <a href="{{route('listkegiatan')}}" class="text-gray-500 hover:text-pink-600">
                    Kegiatan Ormawa
            </a>
            </div>
        </div>


        <div class="flex flex-col mt-10">
        <a href="{{route('admin')}}">
        <div class="flex justify-center mt-2">
                <button class="text-white text-xs bg-blue-300 w-24 h-7 rounded-full">
                    Home
                </button>
            </div> 
        </a>
        <form action="{{route('logout.post')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-2">
                <button type="submit"
                    class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Logout</button>
            </div>
        </form>
        <div class="text-sm opacity-30 px-22 text-center mt-96">
        TCenayang 2022. All Rights Reserved
        </div>
        </div>
        </div>
        </div>


        <div class="flex-auto">
        <div class="flex flex-col">
        <div class="flex bg-white h-24 p-2 drop-shadow-2xl justify-between sticky top-0 z-10">
            <div class="flex flex-col space-x-3">

            

            </div> 
            <div class="w-20 h-20">
            <img src="/pictures/logo_unair.png" alt="Logo Unair <3">
        </div>
        </div>

        <div class="bg-blue-50 min-h-screen align-items-lg-start">
            <div class="grid lg:grid-cols-3 sm:grid-cols-2 p-4 gap-10">
            <!--Grid starts here-->
            
            <!-- Grid ends here..-->

            </div>
        <div class="p-10">
        <div class="bg-white rounded-xl p-10 relative">
            @yield('content')
        </div>
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

=======
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
>>>>>>> 42ff4b15a90efa3e01d8d9ceea06a5e8d45e2a23
            })
    
        </script>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const nilaibtn = document.querySelector('#listuser')
                const nilai = document.querySelector('#droplistuser')
                nilaibtn.addEventListener('click', () => {
                    nilai.classList.toggle('hidden');
                    nilai.classList.toggle('flex');
                })
            })
    
        </script>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const nilaibtn = document.querySelector('#listkegiatan')
                const nilai = document.querySelector('#droplistkegiatan')
                nilaibtn.addEventListener('click', () => {
                    nilai.classList.toggle('hidden');
                    nilai.classList.toggle('flex');
                })
            })
    
        </script>
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const editbtn = document.getElementsByClassName('editbtn')
                const edit = document.getElementsByClassName('editdropdown')
                const editclose = document.getElementsByClassName('closeedit')
                const tambahbtn = document.querySelector('#tambahbtn')
                const tambahoverlay = document.querySelector('#tambahoverlay')
                const closeoverlay = document.querySelector('#closeoverlaybtn')
                const uploadbtn = document.querySelector('#uploadbtn')
                const uploadoverlay = document.querySelector('#uploadoverlay')
                const closeuploadoverlay = document.querySelector('#closeuploadoverlaybtn')
                const body = document.querySelector('#body')
                for (let i = 0; i < editbtn.length; i++) {
                    editbtn[i].onclick = function () {
                        edit[i].style.display = "block";
                    }
                }
                for (let i = 0; i < editclose.length; i++) {
                    editclose[i].onclick = function () {
                        edit[i].style.display = "none";
                    }
                }
                editbtn.addEventListener('click', () => {
                    edit.classList.toggle('hidden');
                    edit.classList.toggle('flex');
                })
                editclose.addEventListener('click', () => {
                    edit.classList.toggle('hidden');
                    edit.classList.toggle('flex');
                })
                tambahbtn.addEventListener('click', () => {
                    tambahoverlay.classList.toggle('hidden');
                    tambahoverlay.classList.toggle('flex');
                    body.classList.toggle('overflow-hidden');
                })
                closeoverlay.addEventListener('click', () => {
                    tambahoverlay.classList.toggle('hidden');
                    tambahoverlay.classList.toggle('flex');
                    body.classList.remove('overflow-hidden');
    
                })
                uploadbtn.addEventListener('click', () => {
                    uploadoverlay.classList.toggle('hidden');
                    uploadoverlay.classList.toggle('flex');
                })
                closeuploadoverlay.addEventListener('click', () => {
                    uploadoverlay.classList.toggle('hidden');
                    uploadoverlay.classList.toggle('flex');
    
                })
            });
    </script>

    @elseif(Auth::user()->role == 'Panitia')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
            Panitia
        </div>
    </div>
    <div class="p-2 hover:bg-pink-100">
    <div class="flex flex-row space-x-3 mt-5">
            
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-700" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </svg>
            <!-- <h4 class="font-bold text-gray-500 hover:text-pink-600 ">Manajemen Mahasiswa</h4> -->
            
            <a href="{{route('panitia.manage')}}" class="text-gray-500 hover:text-pink-600">
                    Manajemen Mahasiswa
            </a>
          </div>
    </div>
    <div class="p-2 hover:bg-pink-100">
          <div class="flex flex-row space-x-3 mt-5">
            
          <span class="material-symbols-outlined h-6 w-6 text-pink-700" fill="none" viewBox="0 0 24 24">
            ballot
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
            </span>
            <!-- <h4 class="font-bold text-gray-500 hover:text-pink-600 ">Manajemen Mahasiswa</h4> -->
            
            <a href="{{route('listkegiatan.panitia')}}" class="text-gray-500 hover:text-pink-600">
                    List Kegiatan
            </a>
          </div>
    </div>
      

      <div class="flex flex-col mt-10">
      <a href="{{route('admin')}}">
      <div class="flex justify-center mt-2">
                <button class="text-white text-xs bg-blue-300 w-24 h-7 rounded-full">
                    Home
                </button>
            </div> 
        </a>
        <form action="{{route('logout.post')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-2">
                <button type="submit"
                    class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Logout</button>
            </div>
        </form>
        <div class="text-sm opacity-30 px-22 text-center mt-96">
        TCenayang 2022. All Rights Reserved
    </div>
      </div>
    </div>
    </div>


    <div class="flex-auto">
      <div class="flex flex-col">
        <div class="flex bg-white h-24 p-2 drop-shadow-2xl justify-between sticky top-0 z-10">
          <div class="flex flex-col space-x-3">

            

          </div> 
          <div class="w-20 h-20">
            <img src="/pictures/logo_unair.png" alt="Logo Unair <3">
        </div>
        </div>
        
        <div class="bg-blue-50 min-h-screen align-items-lg-start">
          <div class="grid lg:grid-cols-3 sm:grid-cols-2 p-4 gap-10">
            <!--Grid starts here-->
            
            <!-- Grid ends here..-->

          </div>
          <div class="p-10">
    <div class="bg-white rounded-xl p-10 relative">
            @yield('content')
    </div>
</div>
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
        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const editbtn = document.getElementsByClassName('editbtn')
                const edit = document.getElementsByClassName('editdropdown')
                const editclose = document.getElementsByClassName('closeedit')
                const tambahbtn = document.querySelector('#tambahbtn')
                const tambahoverlay = document.querySelector('#tambahoverlay')
                const closeoverlay = document.querySelector('#closeoverlaybtn')
                const uploadbtn = document.querySelector('#uploadbtn')
                const uploadoverlay = document.querySelector('#uploadoverlay')
                const closeuploadoverlay = document.querySelector('#closeuploadoverlaybtn')
                const body = document.querySelector('#body')
                for (let i = 0; i < editbtn.length; i++) {
                    editbtn[i].onclick = function () {
                        edit[i].style.display = "block";
                    }
                }
                for (let i = 0; i < editclose.length; i++) {
                    editclose[i].onclick = function () {
                        edit[i].style.display = "none";
                    }
                }
                editbtn.addEventListener('click', () => {
                    edit.classList.toggle('hidden');
                    edit.classList.toggle('flex');
                })
                editclose.addEventListener('click', () => {
                    edit.classList.toggle('hidden');
                    edit.classList.toggle('flex');
                })
                tambahbtn.addEventListener('click', () => {
                    tambahoverlay.classList.toggle('hidden');
                    tambahoverlay.classList.toggle('flex');
                    body.classList.toggle('overflow-hidden');
                })
                closeoverlay.addEventListener('click', () => {
                    tambahoverlay.classList.toggle('hidden');
                    tambahoverlay.classList.toggle('flex');
                    body.classList.remove('overflow-hidden');

                })
                uploadbtn.addEventListener('click', () => {
                    uploadoverlay.classList.toggle('hidden');
                    uploadoverlay.classList.toggle('flex');
                })
                closeuploadoverlay.addEventListener('click', () => {
                    uploadoverlay.classList.toggle('hidden');
                    uploadoverlay.classList.toggle('flex');

                })
            })
            $(document).ready(function () {
                $('.select2').select2();
            });

        </script>
    </body>
    @endif


</body>