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
          <div class="flex bg-gray-300 h-24 p-3 drop-shadow-2xl justify-center sticky top-0">
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
            <a href="{{route('listkegiatanpanitia')}}" class="pb-4">
              <p class="font-regular text-black hover:text-pink-600 text-sm">Melayu</p>
              </a>
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
       
          <div class="grid grid-cols-3 gap-3 p-0 m-8">
            <div class="bg-white rounded-lg col-span-2 ...">
              <div class="p-4">
                <h1 class="font-bold text-xl mb-2 text-center">Contoh Judul</h1>
              </div>
              <img src="https://dummyimage.com/1201x501" class="card-img-top" alt="gambar" >
              <div class="p-4">
                  <!-- <h1 class="font-bold text-xl mb-2 text-center">Contoh Judul</h1> -->
                  <p class="leading-relaxed text-base">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium 
                    voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, 
                    similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum 
                    facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit 
                    quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus 
                    autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et 
                    molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores 
                    alias consequatur aut perferendis doloribus asperiores repellat.On the other hand, we denounce with righteous indignation 
                    and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that 
                    they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty 
                    through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple 
                    and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to 
                    do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the 
                    claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. 
                    The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater 
                    pleasures, or else he endures pains to avoid worse pains
                </p>
              </div>
            </div>
            <div> 
               <div class="bg-white rounded-lg w-96 h-20 m-auto">
                <center> 
                      <a href="/admin-malay"> 
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg w-5/6 text-center m-5">
                          Kembali
                        </button>
                      </a>
                </center>
              </div>
            </div>
          </div>

          
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