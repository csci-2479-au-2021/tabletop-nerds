<x-app-layout>               
    <x-slot name="header">
        <center><br>
        <h1 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __($newReview->title) }}
        </h1><br>
        </center>
        
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <legend class="border-2 border-indigo-600">
            <form class="text-center" method='post' action="{{ route('userGameRating') }}">
                @csrf
                <input type="text" value ="{{$newReview->game_id}}" name="game_id" hidden><br><br>
                <label>Rate Game</label><br>
                <input type="number" name="game_rating" min="1" max="10" step=".1" required><br><br>
                <label>Text Review</label><br>
                <textarea name="text_review" rows="5" columns="10" placeholder="Enter review here..." required></textarea><br><br><br>
                <button style ="padding:.5%;" class="border-2 border-indigo-600" type="reset"> Clear</button>
                <button style ="padding:.5%;" class="border-2 border-indigo-600 " type="submit"> Submit Rating</button><br><br><br>
            <form>
        </legend>
    </div>
</div>
</x-app-layout>

