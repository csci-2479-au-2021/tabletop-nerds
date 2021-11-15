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
                                 <form action="/gameView" method="POST">
                                    <br><br>
                                    <label for="gamerating">Rate Game (1-10)</label>
                                    <input type="number" id="gamerating" name="game_rating" min="1" max="10" step=".1" required>
                                    <br><br>
                                    <label for="textreview">Write a review: </label>
                                    <textarea name="text_review" id="textreview" cols="25" rows="5" placeholder="Enter review here..." required></textarea>
                                    <br><br>
                                    <button style=color:blue type="reset">Clear</button>
                                    <button style=color:red type="submit">Submit</button>
                                    <br><br>  
                                </form>
                            </td>
                        </tr>  
                    </table>  
                    </table> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
