@extends('layouts.admin')
@section('content')

  <div class="flex flex-col mt-64">
    @if(Auth::check() && Auth::user()->role == 'Admin')
    <a href="{{route('admin')}}">
      <div class="flex justify-center mt-2">
        <img src="/pictures/home.png" alt="">
      </div>
      <a href="{{route('RequestedTopics')}}">
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
      @endif

      @if(Auth::check() && Auth::user()->role == 'Community')
        <a href="{{route('community')}}">
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
      @endif

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

        <div id="disqus_thread" class="mt-4 p-8"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://malindo.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
       
         
          
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