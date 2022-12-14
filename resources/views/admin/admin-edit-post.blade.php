@extends('layouts.admin')
@section('content')
      <div class="flex flex-col mt-64">
      <a href="{{route('admin')}}">
      <div class="flex justify-center mt-2">
                <img src="/pictures/home.png" alt="">
            </div> 
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
                <button type="submit"
                    class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Keluar</button>
            </div>
        </form>
        <div class="text-sm opacity-30 px-22 text-center mt-36 sticky">
        Sawadikap 2022. Hak cipta terpelihara
    </div>
      </div>
    </div>
    </div>


    <div class="flex-auto">
        <div class="flex flex-col">
          <div class="flex justify-center bg-gray-300 h-24 p-3 drop-shadow-2xl  top-0">
            <div class="flex flex-col space-x-3">

                <h4 class="font-bold text-black mt-7  text-xl">Edit Post</h4>
    
              </div>
          </div>
  
          

        
        <div class="bg-gray-300 min-h-screen align-items-lg-start">
        
         
            <div class="px-20 py-10 rounded mx-auto">
                
                <form class="flex flex-col gap-y-8  h-full" method="POST" action="{{route('editpostingadmin.post')}}">
                    @csrf
                    <input type="hidden" id="id" name="id" value="{{$articels->id}}">
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                  Title
                </label>
                <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{$articels->title}}" name="title" id="title" type="text" placeholder="Title" >
              </div>
              <div class="mb-4">
                  <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                  <textarea  name="description" id="description" cols="30" rows="10" placeholder="Description" class="shadow border rounded w-full text-gray-700 py-2 px-3 focus:outline-none focus:shadow-outline">{{$articels->description}}</textarea>
              </div>
              <input type="hidden" id="lang" name="lang" value="{{$articels->lang}}">
              <div class="mb-4">
                <label for="textbody" class="block text-gray-700 text-sm font-bold mb-2">Article</label>
                <textarea  name="artikel" id="artikel" cols="30" rows="10" placeholder="Article" class="shadow border rounded w-full text-gray-700 py-2 px-3 focus:outline-none focus:shadow-outline">{{$articels->artikel}}</textarea>
            </div>
              <div class="flex items-center justify-end">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                  Update
                </button>
              </div>
                </form>
            </div>
        </div>
        </div>

          
          <!--Table-->
        
      



@endsection('content')


