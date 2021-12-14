<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl font-bold">
            {{ __('Games') }}
        </h2>
    </x-slot>

    @foreach($games as $game)
    @if(auth()->user())
    <div
        class="grid grid-cols-7 grid-rows-1 gap-1 rounded-lg border-4 border-gray-200 bg-gray-400 shadow-2xl shadow-inner"
        x-data="game">
            <div class="col-span-1">
                <a href="{{ route('gameView', ['id' => $game->id]) }}"><img class="max-w-fit" src="{{$game->image}}"  alt="{{$game->title}}"></a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                <a class="text-2xl text-white font-semibold" href="{{ route('gameView', ['id' => $game->id]) }}">{{$game->title}}</a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                <a class="text-1xl text-white font-semibold">{{$game->release_year}}</a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                <a class="text-1xl text-white font-semibold">{{$game->categoryList()}}</a>
            </div>
            <div class="col-span-1 place-items-center">
                <br><br>
                <a class="text-1xl text-white font-semibold">{{$game->publisher->name}}</a>
            </div>
            <div class="col-span-1 place-items-center">
                @foreach($game->gameUser as $gu)
                    @if ($gu->pivot->text_review !== null)
                        <div class="col-span-1 place-items-center">
                            <br><br>
                                <a class="text-1xl text-white font-semibold">Rating: {{ $gu->pivot->game_rating }}</a>
                        </div>
                    @else
                        <div class="col-span-1 place-items-center">
                            <br><br>
                                <a class="text-1xl text-white font-semibold">Not Rated</a>
                        </div>
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
class="grid grid-cols-7 grid-rows-1 gap-1 rounded-lg border-4 border-gray-200 bg-gray-400 shadow-2xl shadow-inner"
x-data="game">
    <div class="col-span-1">
        <a href="{{ route('gameView', ['id' => $game->id]) }}"><img class="max-w-fit" src="{{$game->image}}"  alt="{{$game->title}}"></a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        <a class="text-2xl text-white font-semibold" href="{{ route('gameView', ['id' => $game->id]) }}">{{$game->title}}</a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        <a class="text-1xl text-white font-semibold">{{$game->release_year}}</a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        <a class="text-1xl text-white font-semibold">{{$game->categoryList()}}</a>
    </div>
    <div class="col-span-1 place-items-center">
        <br><br>
        <a class="text-1xl text-white font-semibold">{{$game->publisher->name}}</a>
    </div>
    <div class="col-span-1 place-items-center">
        @foreach($game->gameUser as $gu)
            @if ($gu->pivot->text_review !== null)
                <div class="col-span-1 place-items-center">
                    <br><br>
                        <a class="text-1xl text-white font-semibold">Rating: {{ $gu->pivot->game_rating }}</a>
                </div>
            @else
                <div class="col-span-1 place-items-center">
                    <br><br>
                        <a class="text-1xl text-white font-semibold">Not Rated</a>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endif
@endforeach
</x-app-layout>