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
                <button type="submit" class="text-white text-xs bg-red-500 w-24 h-7 rounded-full">Keluar</button>
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

                <h4 class="font-bold text-black mt-7  text-xl">Add Topic</h4>

            </div>
        </div>




        <div class="bg-gray-300 min-h-screen align-items-lg-start">


            <div class="px-20 py-10 rounded mx-auto">

                <form class="flex flex-col gap-y-8  h-full" method="POST" action="/addtopiccommunity">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="topic">
                            Topics
                        </label>
                        <input class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="topic" id="topic" type="text" placeholder="Enter Topic">
                    </div>
                 
                    <div class="flex items-center justify-end">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                            Add Topic
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!--Table-->





    @endsection('content')