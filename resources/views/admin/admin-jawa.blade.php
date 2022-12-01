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
      <a href="{{route('admin-manage-post')}}">
        <div class="flex justify-center mt-8">
          <img class="object-scale-down h-10 w-10" src="/pictures/admin1.png" alt="">
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
              <button type="submit" class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Metuo Cokk !!</button>
          </div>
        </form>
        <div class="text-sm opacity-30 px-22 text-center mt-36 sticky">
          Sawadikap 2022. Hak cipta
        </div>
      </div>
    </div>
  </div>

     <!-- NAVBAR-TOP -->
  <div class="flex-auto">
        <div class="flex flex-col">
          <div class="flex bg-gray-300 h-24 p-3 drop-shadow-2xl justify-center  sticky top-0">
            <div class="flex flex-row space-x-36">
            
              <div class="w-20 h-20">
                <a href="{{route('viewmalayadmin')}}"><img src="/pictures/malaysia.png" class="w-20" alt=""></a>
              </div>
              <div class="w-20 h-20">
                <a href="{{ route('admin') }}"><img src="/pictures/indonesia.png" class="w-20" alt="">
                </a>
              </div>
            </div>
            <a href="{{ route('viewProfile') }}">
              <img src="/pictures/account.png" class="fixed z-90 top-2 right-3  w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-300 hover:drop-shadow-2xl hover:animate-bounce duration-300" alt="">
              </a>         
        </div>
  
        <div class="flex bg-gray-300 h-12 p-2 drop-shadow-2xl justify-center sticky top-24">
          <div class="flex flex-row space-x-20">
            <div class="flex flex-row space-x-20">
              <a href="{{route('viewJavaAdmin')}}" class="pb-4">
                <p class="font-regular text-black hover:text-pink-600 text-sm">Javanese</p>
                </a>
                <a href="{{route('viewSundaAdmin')}}" class="pb-4">
                  <p class="font-regular text-black hover:text-pink-600 text-sm">Sundanese</p>
                  </a>
                  
            </div>
          </div>
        </div>
        
        <!-- SEARCH-->
        <div class="bg-gray-300 min-h-screen align-items-lg-start">
          <div class="grid lg:grid-cols-2 sm:grid-cols-2 p-4 gap-10">
          <form action="{{route('viewJavaAdmin')}}" method="GET" role='search'>
                    @csrf
                    <input class="rounded-lg h-9 w-64 pl-10" type="text" name="term" id="term" placeholder="Cari">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default ml-3">
                            <img class="w-5 " src="pictures/search_grey.png" alt="">
                        </button>
                    </span>
                </form>
          </div>
          



    <section class="text-gray-600 body-font">
      <div class="container px-5 py-5 mx-auto">
        <div class="flex flex-col">
          <div class="h-1 bg-gray-200 rounded overflow-hidden">
            <div class="w-24 h-full bg-indigo-500"></div>
          </div>
          <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
            <h1 class="sm:w-2/5 text-gray-900 font-medium title-font text-2xl mb-2 sm:mb-0">Artikel kanggo sinau basa Jawa</h1>

          </div>
      </div>
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
        @foreach ($articles as $article)
        <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
          <div class="rounded-lg h-64 overflow-hidden">
            <img alt="content" class="object-cover object-center h-full w-full" src="https://dummyimage.com/1203x503">
          </div>
          <h2 class="text-xl font-medium title-font text-gray-900 mt-5">{{ $article -> title }}</h2>
          <p class="text-base leading-relaxed mt-2">{{ $article -> description }}</p>
          <a href="{{route('getArticleDetails', $article->id) }}" class="text-indigo-500 inline-flex items-center mt-3">Learn More
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </a>
        </div>
        @endforeach
      </div>
      
    </div>
  </section>

          
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