@if(auth()->user())
    <div
        class="grid grid-cols-7 grid-rows-1 gap-1 rounded-lg border-4 border-gray-200 bg-gray-400 shadow-2xl shadow-inner"
        x-data="game"
        x-init="setGameInfo({{ $game->id }}, {{ auth()->user()->id }}, {{ json_encode($onWishlist) }})">
            <div class="col-span-3">
                <a href="{{ route('gameView', ['id' => $game->id]) }}"><img class="max-w-xs" src="{{$game->image}}"  alt="{{$game->title}}"></a>
            </div>
            <div class="col-span-2 place-items-center">
                <br><br><br><br><br>
                <a class="text-4xl text-white font-semibold" href="{{ route('gameView', ['id' => $game->id]) }}">{{$game->title}}</a>
            </div>
            <div class="col-span-2 align-left">
                <br><br><br><br><br>

                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xl shadow-inner"
                        type="submit"
                        x-bind="toggleWishlist"
                        x-text="getButtonText"></button><br><br><br>
            </div>
    </div>
@else
    <div class="grid grid-cols-7 grid-rows-1 gap-1 rounded-lg border-4 border-gray-200 bg-gray-400 shadow-2xl shadow-inner">
        <div class="col-span-3">
            <a href="{{ route('gameView', ['id' => $game->id]) }}"><img class="max-w-xs" src="{{$game->image}}"  alt="{{$game->title}}"></a>
        </div>
        <div class="col-span-2 place-items-center">
            <br><br><br><br><br>
            <a class="text-4xl text-white font-semibold" href="{{ route('gameView', ['id' => $game->id]) }}">{{$game->title}}</a>
        </div>
    </div>
@endif
