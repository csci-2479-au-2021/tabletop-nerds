<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl font-bold">
            {{ __('Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-600  border-b border-gray-200 grid gap-4"
                     x-data="{ user_id: {{auth()->user()->id}} }">
                        @foreach($games as $gameInfo)
                        @php
                            list($onWishlist, $game) = $gameInfo;
                        @endphp
                        <div
                            class="grid grid-cols-7 grid-rows-1 gap-1 rounded-lg border-4 border-gray-200 bg-gray-400 shadow-2xl shadow-inner"
                            x-data="{ game_id: {{$game->id}}, on_wishlist: {{json_encode($onWishlist)}} }">
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
                                            @click="() => tabletop.games.toggleWishlist(game_id, user_id, on_wishlist)"
                                            x-text="on_wishlist ? 'Remove from wishlist' : 'Add to wishlist'"></button><br><br><br>
                                </div>    
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
