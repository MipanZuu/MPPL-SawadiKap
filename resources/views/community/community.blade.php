@extends('layouts.normalUser')
@section('content')
      <div class="flex flex-col mt-64">
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

        {{-- <form action="{{route('backup')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-8">
                <img src="/pictures/Add.png" alt="">
            </div>
        </form> --}}
        <form action="{{route('logout.post')}}" method="POST">
            @csrf
            <div class="flex justify-center mt-8">
                <button type="submit"
                    class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Logout</button>
            </div>
        </form>
        <div class="text-sm opacity-30 px-22 text-center mt-36 sticky">
        Sawadikap 2022. All Rights Reserved
    </div>
      </div>
    </div>
    </div>


    <div class="flex-auto">
      <div class="flex flex-col">
        <div class="flex bg-gray-300 h-24 p-3 drop-shadow-2xl justify-center  sticky top-0">
          <div class="flex flex-row space-x-36">
          
          <div class="w-20 h-20">
            <a href="{{route('viewmalayadmin')}}"><img src="/pictures/malaysia.png" class="w-20" alt="">
            </a>
        </div>
        <div class="w-20 h-20">
          <a href="{{ route('community') }}"><img src="/pictures/indonesia.png" class="w-20" alt="">
          </a>
        </div>
      </div>
          <a href="{{ route('viewProfile') }}">
            <img src="/pictures/account.png" class="fixed z-90 top-2 right-3  w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-700 hover:drop-shadow-2xl hover:animate-bounce duration-300" alt="">
          </a>
      
          
        </div>
        

        <div class="flex bg-gray-300 h-12 p-2 drop-shadow-2xl justify-center sticky top-24">
          <div class="flex flex-row space-x-20">
            <a href="" class="pb-4">
              <p class="font-regular text-black hover:text-pink-600 text-sm">Javanese</p>
              </a>
              <a href="{{ route('viewSundaCommunity') }}" class="pb-4">
                <p class="font-regular text-black hover:text-pink-600 text-sm">Sundanese</p>
                </a>
          </div>
        </div>
        
        <div class="bg-gray-300 min-h-screen align-items-lg-start">

          {{-- <div class="grid lg:grid-cols-2 sm:grid-cols-2 p-4 gap-10">
          <form action="{{route('listmahasiswa')}}" method="GET" role='search'>
                    @csrf
                    <input class="rounded-lg h-9 w-64 pl-10" type="text" name="term" id="term" placeholder="Search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default ml-3">
                            <img class="w-5 " src="pictures/search_grey.png" alt="">
                        </button>
                    </span>
                </form>
          </div> --}}
        

            


            <div class="grid lg:grid-cols-2 sm:grid-cols-2 p-4 gap-10">
              <!--Grid starts here-->
              
              <!-- Grid ends here..-->
  
  
              <div class="flex items-center justify-between p-5 mt-10 bg-white rounded shadow-sm">
                <div>
                  <div class="text-sm text-gray-400 ">Jumlah Users</div>
                  <div class="flex items-center pt-1">
                    <div class="text-3xl font-medium text-gray-600 ">{{{Auth::user()->count()}}}</div>
                  </div>
                </div>
                <div class="text-pink-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </div>


              <div class="flex items-center justify-between p-5 mt-10 bg-white rounded shadow-sm">
                <div>
                  <div class="text-sm text-gray-400 ">Jumlah Posts</div>
                  <div class="flex items-center pt-1">
                    <div class="text-3xl font-medium text-gray-600 ">{{{$post}}}</div>
                  </div>
                </div>
                <div class="text-pink-500">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                      clip-rule="evenodd" />
                  </svg>
                </div>
              </div>

              


  
            </div>

            
          
          <!--Table-->
          <a href="">
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