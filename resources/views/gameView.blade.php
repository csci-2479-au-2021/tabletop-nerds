<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($game->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed border-collapse border-green-800">
                        <tr>
                            <th class="w-1/2 border border-green-600">Image</th> 
                            <th class="w-1/2 border border-green-600">Description</th>
                            <th class="w-1/2 border border-green-600">Release Year</th>
                            <th class="w-1/2 border border-green-600">Rate Game</th>
                        </tr>
                        <tr>
                            <td class="content-center border border-green-600"><img src="{{$game->image}}"></td> 
                            <td class="text-center border border-green-600">{{$game->description}}</td>
                            <td class="text-center border border-green-600">{{$game->release_year}}</td>  
                            <td class="text-center border border-green-600">
                            <a href="{{ route('addGameRating', ['id' => $game->id]) }}">Submit a Review</a>
                            </td>
                            
                        </tr>  
                    </table>   
                </div>
            </div>
        </div>
    </div>
    
<!-- 
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <legend class="border-2 border-indigo-600">
            <form class="text-center" method='post' action="{{ route('userGameRating') }}">
                @csrf
                <input type="text" value ="{{$game->id}}" name="game_id" hidden>
                <label>Game Rating</label><br>
                <input type="number" name="game_rating"><br><br><br>
                <label>Text Review</label><br>
                <textarea name="text_review" rows="10" columns="10"> </textarea><br><br><br>
                <button class="border-2 border-indigo-600 "type="submit"> Submit Rating</button><br><br><br>
            <form>
        </legend>
    </div>
</div> -->



</x-app-layout>
