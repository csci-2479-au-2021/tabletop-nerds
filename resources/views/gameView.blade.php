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

    <div class="grid grid-cols-6 grid-rows-1 gap-1 p-2 shadow-2xl rounded-lg border-4">
        <div class="col-start-1 col-span-2 row-start-1 row-span-1 flex content-center border-4 ">
            <img class="mx-auto" src="{{$game->image}}">
        </div>
    
        <div class="col-start-3 col-span-4 row-start-1 row-span-1 p-2 text-center shadow-2xl rounded-lg border-4 border-green-200">    
        
            <br>
            <h2 class="text-2xl font-extrabold border-b-8 border-purple-900" >Average Rating<h2>
                <p class="text-xl">6.5</p>
            <br>
            <h2 class="text-2xl font-extrabold border-b-8 border-purple-900">Publisher<h2>
                <p class="text-xl">Content Content Content</p>
            <br>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Release Year</h2> 
                <p class="text-xl">{{$game->release_year}}<p>
            <br>
            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Category(ies)<h2>
                <p class="text-xl">Content Content Content</p>  
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
