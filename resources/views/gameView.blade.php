<x-app-layout>

    <x-slot name="header">
        <div class="grid grid-cols-6 grid-rows-1 "
            @if(auth()->user())
             x-data="game"
             x-init="setGameInfo({{ $game->id }}, {{ auth()->user()->id }}, {{ json_encode($game->isOnWishlist()) }})"
            @endif
        >
            <h1 class="col-span-5 font-extrabold text-6xl text-yellow-500 leading-tight">
                {{ __($game->title) }}
            </h1>

            @if(auth()->user())
                <button class="text-2xl bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded"
                        x-bind="toggleWishlist"
                        x-text="getButtonText"></button>
            @endif
        </div>
    </x-slot> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-6 grid-rows-1 gap-1 p-2 shadow-2xl rounded-lg border-4">
                <div class="col-start-1 col-span-2 row-start-1 row-span-1 flex content-center border-4 bg-white">
                    <img class="mx-auto p-3" src="{{$game->image}}">
                </div>
            
                <div class="col-start-3 col-span-4 row-start-1 row-span-1 p-2 text-center shadow-2xl rounded-lg border-4 border-green-200">    
                
                    <br>
                    <div class="grid grid-cols-7 grid-rows-2 gap-1">
                        <h2 class="col-span-7 text-2xl font-extrabold border-b-8 border-purple-900" >Average Rating<h2>
                        <h2 class="col-start-4 row-start-2 text-xl col-span-1">{{$game->average_rating}}</h2>
                        <a class="col-start-6 row-start-2 col-span-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" href="{{ route('addGameRating', ['id' => $game->id]) }}">Submit a Review</a> 
                    </div>
                    <br>
                    <h2 class="text-2xl font-extrabold border-b-8 border-purple-900">Publisher<h2>
                        <p class="text-xl">{{$game->publisher->name}}</p>
                    <br>
                    <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Release Year</h2> 
                        <p class="text-xl">{{$game->release_year}}<p>
                    <br>
                    <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Category(ies)<h2>
                        <p class="text-xl">
                            @foreach($game->gameCategory as $cat)
                                <span>{{$cat->name}}</span>
                            @endforeach
                        </p>  
                </div>

                <div class="grid col-start-1 col-span-6 gap-6 p-4 shadow-2xl rounded-lg border-4">
                    <h2 class="text-2xl font-extrabold border-b-8 border-purple-900">Description<h2>
                        <p class="text-xl">{{$game->description}}</p>
                </div>

                <div class="grid col-start-1 col-span-6 gap-6 p-4 shadow-2xl rounded-lg border-4">
                    <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Reviews<h2>

                    @foreach($game->gameUser as $gu)
                    <div class="grid col-start-1 col-span-6 gap-6 p-4 rounded-lg border-4">
                            <h2 class="text-2xl font-extrabold border-b-8 border-blue-500">Rating: {{ $gu->pivot->game_rating }}<h2>
                            <p class="text-xl">{{$gu->pivot->text_review}}</p>
                    </div>
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    

</x-app-layout>
