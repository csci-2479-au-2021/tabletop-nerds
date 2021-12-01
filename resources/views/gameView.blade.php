<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-6 grid-rows-1">
            <h1 class="col-span-5 font-semibold text-4xl text-gray-800 leading-tight">
                {{ __($game->title) }}
            </h1>

            <form class="text-center" method="post" action="{{ route('addToWishlist') }}">
                    @csrf
                    <input hidden value="{{$game->id}}" name="game_id"> </input>
                    <input hidden value="1" name ="on_wishlist"></input>
                    <button class=" text-2xl bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" type="submit"> Add To Wishlist</button>
            </form>
        </div>
    </x-slot>

    <!-- <div class="py-12">
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
            </div>-->
    <div class="grid grid-cols-6 grid-rows-1 gap-1 p-2 shadow-2xl rounded-lg border-4">
        <div class="col-start-1 col-span-2 row-start-1 row-span-1 flex content-center border-4 ">
            <img class="mx-auto" src="{{$game->image}}">
        </div>
    
        <div class="col-start-3 col-span-4 row-start-1 row-span-1 p-2 text-center shadow-2xl rounded-lg border-4 border-green-200">    
        
            <br>
            <div class="grid grid-cols-7 grid-rows-2 gap-1">
                <h2 class="col-span-7 text-2xl font-extrabold border-b-8 border-purple-900" >Average Rating<h2>
                <h2 class="col-start-4 row-start-2 text-2xl col-span-1">6.5</h2>
                <a class="col-start-6 row-start-2 col-span-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" href="{{ route('addGameRating', ['id' => $game->id]) }}">Submit a Review</a>
                <br>
            </div>
            <br>
            <h2 class="text-2xl font-extrabold border-b-8 border-purple-900">Publisher<h2>
                <p class="text-xl">Content Content Content</p>
            <br>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Release Year</h2> 
                <p class="text-xl">{{$game->release_year}}<p>
            <br>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Category(ies)<h2>
                <p class="text-xl">Content Content</p>  
        </div>

        <div class="grid col-start-1 col-span-6 gap-6 p-4 shadow-2xl rounded-lg border-4">
            <h2 class="text-2xl font-extrabold border-b-8 border-purple-900">Description<h2>
                <p class="text-xl">{{$game->description}}</p>
        </div>

        <div class="grid col-start-1 col-span-6 gap-6 p-4 shadow-2xl rounded-lg border-4">
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Reviews<h2>
                <p class="text-xl">Content</p>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Reviews<h2>
                <p class="text-xl">Content</p>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Reviews<h2>
                <p class="text-xl">Content</p>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Reviews<h2>
                <p class="text-xl">Content</p>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Reviews<h2>
                <p class="text-xl">Content</p>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Reviews<h2>
                <p class="text-xl">Content</p>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Reviews<h2>
                <p class="text-xl">Content</p>

        </div>
    </div>

    

</x-app-layout>
