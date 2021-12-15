<x-app-layout>

    <x-slot name="header">
        <div class="grid grid-cols-6 grid-rows-1 ">
           
            <h1 class="col-span-5 font-extrabold text-6xl text-yellow-500 leading-tight">
                New Game Details
            </h1>
        </div>
    </x-slot> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <legend class="border-2 border-indigo-600">
                        <form class="text-center" method='post' action="{{ route('PostAddGame') }}">
                            @csrf
                            <br><br>
                            <label class="font-extrabold" >Title</label><br>
                            <input type="text" placeholder="Game title" name="title" required><br><br>
                            <label class="font-extrabold" >Publisher</label><br>
                            <select name="publisher">
                                <option value="">Publisher</option>
                                @foreach ($publishers as $key => $value)
                                    <option value ="{{$value->id}}"> {{$value->name}}</option>
                                @endforeach
                            </select>
                            <br><br>
                            <label class="font-extrabold" >Categories</label><br>
                            @foreach ($categories as $key => $value)
                                <input type="checkbox" name="category[{{$key}}]" value="{{$value->id}}">
                                <label for="vehicle1"> {{$value->name}}</label><br>
                            @endforeach
                            <br><br>
                            <label class="font-extrabold" >Release Year</label><br>
                            <input type="text" placeholder="****" name="release_year" required><br><br>
                            <label class="font-extrabold" >Description</label><br>
                            <textarea name="description" rows="5" columns="10" placeholder="Enter description here" required></textarea><br><br><br>
                            <button style ="padding:.5%;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" type="submit"> Add Game</button>
                            <a style ="padding:.5%;" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{route('AdminView')}}"> Cancel</a><br><br><br>
                        <form>
                    </legend>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
