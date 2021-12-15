<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl font-bold">
            {{ __('Games') }}
        </h2>
    </x-slot>
    
    <div class="grid grid-cols-7 grid-rows-1 gap-6 rounded-lg border-4 border-blue-100 bg-blue-50">
        <div class="col-start-2 col-span-1 p-1 place-items-center">
            <a class="text-2xl text-blue-800 font-bold">Title</a>
        </div>
        <div class="col-start-3 col-span-1 p-1 place-items-center">
            <a class="text-2xl text-blue-800 font-bold">Release Year</a>
        </div>
        <div class="col-start-4 col-span-1 p-1 place-items-center">
            <a class="text-2xl text-blue-800 font-bold">Category</a>
        </div>
        <div class="col-start-5 col-span-1 p-1 place-items-center">
            <a class="text-2xl text-blue-800 font-bold">Publisher</a>
        </div>
        <div class="col-start-6 col-span-1 p-1 place-items-center">
            <a class="text-2xl text-blue-800 font-bold">Avg Rating</a>
        </div>
    </div>

    @foreach($games as $game)
    @if(auth()->user())
    <div
        class="grid grid-cols-7 grid-rows-1 gap-6 rounded-lg border-4 border-blue-600 bg-blue-100 shadow-2xl shadow-inner"
        x-data="game"
        x-init="setGameInfo({{ $game->id }}, {{ auth()->user()->id }}, {{ json_encode($game->isOnWishlist()) }})">
            <div class="col-span-1">
                <a href="{{ route('gameView', ['id' => $game->id]) }}"><img class="max-w-fit" src="{{$game->image}}"  alt="{{$game->title}}"></a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                <a class="text-2xl text-blue-800 font-semibold" href="{{ route('gameView', ['id' => $game->id]) }}">{{$game->title}}</a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                <a class="text-1xl text-blue-800 font-semibold">{{$game->release_year}}</a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                <a class="text-1xl text-blue-800 font-semibold">{{$game->categoryList()}}</a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                <a class="text-1xl text-blue-800 font-semibold">{{$game->publisher->name}}</a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                @foreach($game->gameUser as $gu)
                    @if ($gu->pivot->text_review !== null)
                            <a class="text-1xl text-blue-800 font-semibold">{{ $gu->pivot->game_rating }}</a>
                    @else
                            <a class="text-1xl text-blue-800 font-semibold">Not Rated</a>
                    @endif
                @endforeach
            </div>
            {{-- ^^ WTF why wont you work, NOTRATED?! F U ^^ --}}
            <div class="col-span-1 place-items-center">
                <br><br>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded text-sm shadow-inner"
                        type="submit"
                        x-bind="toggleWishlist"
                        x-text="getButtonText"></button>
            </div>
    </div>
@else
<div
class="grid grid-cols-7 grid-rows-1 gap-6 rounded-lg border-4 border-purple-600 bg-purple-100 shadow-2xl shadow-inner"
x-data="game">
    <div class="col-span-1">
        <a href="{{ route('gameView', ['id' => $game->id]) }}"><img class="max-w-fit" src="{{$game->image}}"  alt="{{$game->title}}"></a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        <a class="text-2xl text-purple-800 font-semibold" href="{{ route('gameView', ['id' => $game->id]) }}">{{$game->title}}</a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        <a class="text-1xl text-purple-800 font-semibold">{{$game->release_year}}</a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        <a class="text-1xl text-purple-800 font-semibold">{{$game->categoryList()}}</a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        <a class="text-1xl text-purple-800 font-semibold">{{$game->publisher->name}}</a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        @foreach($game->gameUser as $gu)
            @if ($gu->pivot->text_review !== null)
                <a class="text-1xl text-purple-800 font-semibold">{{ $gu->pivot->game_rating }}</a>
            @else
                <a class="text-1xl text-purple-800 font-semibold">Not Rated</a>
            @endif
        @endforeach
    </div>
</div>
@endif
@endforeach
</x-app-layout>