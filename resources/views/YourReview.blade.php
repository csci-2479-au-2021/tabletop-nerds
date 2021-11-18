<x-app-layout>
    <x-slot name="header">
       <center><br><br>
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Your review was submitted successfully!
        </h2><br>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Game Id: {{ __($userReview->game_id) }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Game Rating: {{ __($userReview->game_rating) }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Text Review:  {{ __($userReview->text_review) }}
        </h2>
        </center>   
</x-app-layout>
