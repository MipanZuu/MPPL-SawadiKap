@extends('layouts.normalUser')
@section('content')

<div class="flex flex-col mt-64">
  <a href="{{ route('home') }}">
<div class="flex justify-center mt-2">
          <img src="/pictures/home.png" alt="">
      </div> 
<a href="{{route('landing') }}">
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

  {{-- <form action="{{route('backup')}}" method="POST">
      @csrf
      <div class="flex justify-center mt-8">
          <img src="/pictures/Add.png" alt="">
      </div>
  </form> --}}
  {{-- <form action="{{route('landing') }}" >
 
      <div class="flex justify-center mt-8">
          <button type="submit"
              class="text-white text-xs bg-indigo-500 w-24 h-7 rounded-full">Landing</button>
      </div>
  </form> --}}
  <div class="text-sm opacity-30 px-22 text-center mt-36 sticky">
  Sawadikap 2022. All Rights Reserved
</div>
</div>
    </div>
  </div>

     <!-- NAVBAR-TOP -->
  <div class="flex-auto bg-gray-300">
        <div class="flex flex-col">
          <div class="flex bg-gray-300 h-24 p-3 drop-shadow-2xl justify-center  top-0">
            
                  
        </div>
  
        <div class="grid grid-cols-3 gap-3 p-0 m-8">
          <div class="bg-white rounded-lg col-span-2 ...">
            <div class="p-4">
              
              <h1 class="font-bold text-xl mb-2 text-center">{{ $articels->title }}</h1>
              
            </div>
            <img src="https://dummyimage.com/1201x501" class="card-img-top" alt="gambar" >
            <div class="p-4">
                <!-- <h1 class="font-bold text-xl mb-2 text-center">Contoh Judul</h1> -->
                <p class="leading-relaxed text-base">{{ $articels->artikel }}
              </p>
            </div>
          </div>
          <div> 
             <div class="bg-white rounded-lg w-96 h-20 m-auto">
              <center> 
                    <a href="{{ URL::previous() }}"> 
                      <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg w-5/6 text-center m-5">
                        Kembali
                      </button>
                    </a>
              </center>
              
            </div>
    
            
          </div>
        </div>

        <!-- SNIPPET -->
    <div class="w-max-full grid justify-items-center">
      <div class="max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 align items-center">
       
        @foreach ($snippets as $snippet)
        @if($snippet->lang == "jv" )
        <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center mb-5">Javanese</h5>
      @endif
      @if($snippet->lang == "ms" )
      <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center mb-5">Melayu</h5>
      @endif
      @if($snippet->lang == "su" )
      <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white text-center mb-5">Sundanese</h5>
      @endif

        <div class="grid grid-cols-3 gap-4 justify-items-center">
          <div class="text-lg mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $snippet->body }} </div>
          <div class="mt-3 w-12 border-t-4 border-gray-700"></div>
          <div class="text-lg mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $snippet->body_eng }}</div>
        </div>
        @endforeach
      </div>
    </div>
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