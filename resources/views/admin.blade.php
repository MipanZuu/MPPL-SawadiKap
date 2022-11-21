@extends('layouts.admin')
@section('content')
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
                <img src="pictures/dropdown.png" alt="">
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
                <img src="pictures/dropdown.png" alt="">
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
        <div class="flex bg-gray-300 h-24 p-2 drop-shadow-2xl justify-between sticky top-0">
          <div class="flex flex-col space-x-3">

            <img src="/pictures/malaysia.png" alt="">
            <img src="/pictures/indonesia.png" alt="">

          </div>
          <div class="w-20 h-20">
          <img src="/pictures/avatar.svg" class="w-20" alt="">
        </div>
        </div>
        
        <div class="bg-gray-300 min-h-screen align-items-lg-start">
          <div class="grid lg:grid-cols-2 sm:grid-cols-2 p-4 gap-10">
            <!--Grid starts here-->
            
            <!-- Grid ends here..-->


          </div>
          


<!-- 
          <div class=" mt-5 grid  lg:grid-cols-3  md:grid-cols-3 p-4 gap-3">

            <div class="col-span-2 flex flex-col   p-8 bg-white rounded shadow-sm">
              <b class="flex flex-row text-gray-500">Property Release for today</b>
              <canvas class="p-5" id="chartLine"></canvas>
            </div>

            <div class=" flex flex-col   p-5 bg-white rounded shadow-sm">
              <b class="flex flex-row text-gray-500">Occupancy Percentage</b>
              <canvas class="p-5" id="chartRadar"></canvas>
            </div>
          </div>

           -->
          <!--Table-->
          
          </div>
        </div>
      </div>

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


@endsection('content')