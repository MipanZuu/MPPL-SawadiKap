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
          <div class="flex bg-gray-300 h-24 p-3 drop-shadow-2xl justify-end  top-0">
            <div class="flex flex-row space-x-36">
            
            </div>
            <a href="{{ route('viewProfile') }}">
              <img src="/pictures/account.png" class=" top-2 right-3  w-20 h-20 rounded-full drop-shadow-lg flex justify-center items-center text-white text-4xl hover:bg-blue-300 hover:drop-shadow-2xl hover:animate-bounce duration-300" alt="">
              </a>         
        </div>
  
        <div class="flex bg-gray-300 h-12 p-2 drop-shadow-2xl justify-center  top-24">
          <div class="flex flex-row space-x-20">
            
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

          <div>
            <h1 class="text-2xl font-medium"><center>Article List</center></h1>
          </div>
          
          <div class="overflow-x-auto relative shadow-md rounded-lg bg-white p-7 m-5">
            <div class="flex flex-row justify-between">
            <div class="mb-4">
          <form action="{{route('viewmalayadmin')}}">
            <select name="lang" id="lang" class="w-40 rounded-lg">
              <option value="jv">Javanese</option>
              <option value="su">Sundanese</option>
              <option value="ms">Melayu</option>
            </select>
          </form>
          </div>
          <a href="/"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-5">Article Edit Request</button></a>
          </div>
            
            <table class="w-full text-sm text-left text-gray-900 border-collapse border border-slate-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th class="border border-slate-700 py-3 px-6"scope="col">
                            No
                        </th>
                        <th class="border border-slate-700 py-3 px-6"scope="col">
                            Title
                        </th>
                        <th class="border border-slate-700 py-3 px-6"scope="col">
                            Description
                        </th>
                        <th class="border border-slate-700 py-3 px-6"scope="col">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($articles as $index => $article)
                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap w-6">
                          {{$index+1}}.
                        </th>
                        <td  class="border border-slate-700 py-4 px-6 w-60">
                          {{ $article -> title }}
                        </td>
                        <td class="border border-slate-700 py-4 px-6">
                          {{ $article -> description }} 
                        </td>
                        <td  class=" border border-slate-700 py-4 px-6  w-56">
                          <div class="flex justify-evenly">
                          <a href="{{ route('admin-edit-post', $article->id) }}"><button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mr-3">Edit</button></a>
                          <form action="{{route('posting.delete',[$article->id])}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus Post ini?')">
                           @csrf
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">Hapus</button>
                          </form>
                        </div>
                        </td>
                        
                      </tr>  
                      @endforeach                           
                </tbody>
            </table>
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