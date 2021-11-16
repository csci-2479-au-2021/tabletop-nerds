<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($newReview->title) }}
        </h2>


    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <legend class="border-2 border-indigo-600">
            <form class="text-center" method='post' action="{{ route('userGameRating') }}">
                @csrf
                <input type="text" value ="{{$newReview->game_id}}" name="game_id" hidden>
                <label>Game Rating</label><br>
                <input type="number" name="game_rating"><br><br><br>
                <label>Text Review</label><br>
                <textarea name="text_review" rows="10" columns="10"> </textarea><br><br><br>
                <button class="border-2 border-indigo-600 "type="submit"> Submit Rating</button><br><br><br>
            <form>
        </legend>
    </div>
</div>


</x-app-layout>
