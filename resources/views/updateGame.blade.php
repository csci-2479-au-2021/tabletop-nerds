<x-app-layout>

    <x-slot name="header">
        <div class="grid grid-cols-6 grid-rows-1 ">
           
            <h1 class="col-span-5 font-extrabold text-6xl text-yellow-500 leading-tight">
                 Update Game Details
            </h1>
        </div>
    </x-slot> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <legend class="border-2 border-indigo-600">
                        <form class="text-center" method='post' action="{{ route('PostUpdateGame') }}">
                            @csrf
                            <input type="text" value ="{{$game->id}}" name="game_id" hidden><br><br>
                            <label class="font-extrabold" >Title</label><br>
                            <input type="text" value ="{{$game->title}}" name="title" required><br><br>
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
                                @if(in_array($value->name, $gameCategories))
                                <input type="checkbox" name="category[{{$key}}]" value="{{$value->id}}" checked>
                                <label for="vehicle1"> {{$value->name}}</label><br>

                                @else
                                <input type="checkbox" name="category[{{$key}}]" value="{{$value->id}}">
                                <label for="vehicle1"> {{$value->name}}</label><br>
                                @endif
                            @endforeach
                            <br><br>
                            <label class="font-extrabold" >Release Year</label><br>
                            <input type="text" value ="{{$game->release_year}}" name="release_year" required><br><br>
                            <label class="font-extrabold" >Description</label><br>
                            <textarea name="description" rows="5" columns="10"required>{{$game->description}}</textarea><br><br><br>
                            <a style ="padding:.5%;" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{route('AdminView')}}"> Cancel</a>
                            <button style ="padding:.5%;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" type="submit"> Update Game</button><br><br><br>
                        <form>
                    </legend>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
