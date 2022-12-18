@extends('layouts.admin')
@section('content')
<div class="flex flex-col mt-64">
    <a href="{{route('admin')}}">
        <div class="flex justify-center mt-2">
            <img src="/pictures/home.png" alt="">
        </div>
        <a href="/requestedtopics">
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

                <h4 class="font-bold text-black mt-7  text-xl">Requested Topics</h4>

            </div>
        </div>




        <div class="bg-gray-300 min-h-screen">

            <div class="mx-20 overflow-x-auto  shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                #
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Topics
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($topics as $index => $topic)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                             <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{($topics->currentPage()-1) * 10 + $index+1}}.
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $topic->topic }}
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if(($topic->status)  === 1)
                                <h1 class="text-green-500">Uploaded</h1>
                                @else
                                <h1 class="text-red-500">not yet uploaded</h1>
                                @endif
                            </th>
                            
                            <td class="flex justify-evenly" style="width: 200px;">
                                @if(($topic->status)  === 0)
                                <form action="{{route('AcceptTopics',[$topic->id])}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menambahkan topik ini?')">
                                    @csrf
                                     <button class="mt-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Accept</button>
                                   </form>
                                
                                <form action="{{route('RejectTopics',[$topic->id])}}" method="post" onsubmit="return confirm('Apakah anda yakin akan menghapus topik ini?')">
                                    @csrf
                                     <button class="mt-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reject</button>
                                   </form>
                                @else
                                <h1 class="p-3">No Action </h1>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-12">
                    {{ $topics->links('pagination::tailwind') }}
                </div>
            </div>

        </div>
    </div>


    <!--Table-->





    @endsection('content')