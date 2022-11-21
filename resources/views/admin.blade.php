@extends('layouts.admin')
@section('content')
      <div class="flex flex-col mt-80">
      <a href="{{route('admin')}}">
      <div class="flex justify-center mt-2">
                <img src="/pictures/home.png" alt="">
            </div> 
      <a href="{{route('uploadpetunjuk')}}">
      <div class="flex justify-center mt-8">
                <img src="/pictures/explore.png" alt="">
            </div>
        </a>
        <form action="{{route('backup')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-8">
                <img src="/pictures/book.png" alt="">
            </div>
        </form>
        <form action="{{route('logout.post')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-8">
                <button type="submit"
                    class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Logout</button>
            </div>
        </form>
        <div class="text-sm opacity-30 px-22 text-center mt-64 sticky">
        Sawadikap 2022. All Rights Reserved
    </div>
      </div>
    </div>
    </div>


    <div class="flex-auto">
      <div class="flex flex-col">
        <div class="flex bg-gray-300 h-24 p-2 drop-shadow-2xl justify-between sticky top-0">
          <div class="flex flex-col space-x-6">
          </div>
          <div class="w-20 h-20">
          <img src="/pictures/malaysia.png" class="w-20" alt="">
        </div>
        <div class="w-20 h-20">
          <img src="/pictures/indonesia.png" class="w-20" alt="">
        </div>
          <div class="w-20 h-20">
          <img src="/pictures/account.png" class="w-20" alt="">
        </div>
        </div>

        

        <div class="flex bg-gray-300 h-24 p-2 drop-shadow-2xl justify-center sticky top-14">
          <div class="flex flex-row space-x-20">
            <a href="{{route('listkegiatanpanitia')}}" class="pb-4">
              <p class="font-regular text-black hover:text-pink-600 text-sm">Javanese</p>
              </a>
              <a href="{{route('listkegiatanpanitia')}}" class="pb-4">
                <p class="font-regular text-black hover:text-pink-600 text-sm">Sundanese</p>
                </a>
                <a href="{{route('listkegiatanpanitia')}}" class="pb-4">
                  <p class="font-regular text-black hover:text-pink-600 text-sm">Betawinese</p>
                  </a>
          </div>
        </div>
        
        <div class="bg-gray-300 min-h-screen align-items-lg-start">
          <div class="grid lg:grid-cols-2 sm:grid-cols-2 p-4 gap-10">
            <!--Grid starts here-->


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