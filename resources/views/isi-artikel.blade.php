@extends('layouts.admin')
@section('content')

  <div class="flex flex-col mt-64">
      <a href="{{route('admin')}}">
        <div class="flex justify-center mt-2">
          <img src="/pictures/home.png" alt="">
        </div> 
      </a>
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

  {{-- <form action="{{route('backup')}}" method="POST">
          @csrf
          <div class="flex justify-center mt-8">
            <img src="/pictures/Add.png" alt="">
          </div>
        </form> --}}

        <form action="{{route('logout.post')}}" method="POST">
          @csrf
          <div class="flex justify-center mt-8">
              <button type="submit" class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Keluar</button>
          </div>
        </form>
        <div class="text-sm opacity-30 px-22 text-center mt-36 sticky">
          Sawadikap 2022. Hak cipta terpelihara
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

        
        <!-- SEARCH-->
        <!-- <div class="bg-gray-300 min-h-screen align-items-lg-start">
          <div class="grid lg:grid-cols-2 sm:grid-cols-2 p-4 gap-10">
          <form action="{{route('listmahasiswa')}}" method="GET" role='search'>
                    @csrf
                    <input class="rounded-lg h-9 w-64 pl-10" type="text" name="term" id="term" placeholder="Cari">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default ml-3">
                            <img class="w-5 " src="pictures/search_grey.png" alt="">
                        </button>
                    </span>
                </form>
          </div> -->
       
         
          
          <!--Table-->
          <a href="{{route('addpostingadmin')}}">
          <button  title="Add Article"
        class="fixed z-90 bottom-10 right-8 bg-blue-600 w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-700 hover:drop-shadow-2xl hover:animate-bounce duration-300">&#43;</button>
      </a>
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