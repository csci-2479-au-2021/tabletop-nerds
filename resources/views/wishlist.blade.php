<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Wishlist') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-5xl font-bold">Your Wishlist </h3>
                    <table class="table-fixed border-collapse border-green-800">
                        <tr>
                            <th class="w-1/4 border border-green-600">Game Image</th> 
                            <th class="w-1/4 border border-green-600">Game Title</th> 
                            <th class="w-1/4 border border-green-600">Game Description</th>
                            <th class="w-1/4 border border-green-600">Remove from Wishlist</th> 
                        </tr>
                        
                            @if(count($wishlist) == 0)
                            <tr>
                                <td colspan="4" class=" text-2xl text-center  border border-green-600"> There is nothing in your wishlist yet <td>
                            </tr>
                        
                            @else
                            @foreach($wishlist as $game) 
                            <tr>
                                <td class="content-center border border-green-600">
                                <a href="{{ route('gameView', ['id' => $game->game_id]) }}"><img src="{{$game->image}}"  alt="{{$game->title}}"></a>
                                </td>
                                <td class="text-center  border border-green-600">{{$game->title}}</td>
                                <td class="text-center border border-green-600">{{$game->description}}</td>
                                <td class="text-center border border-green-600">
                                    <form method="post" action="{{ route('removeFromWishlist') }}">
                                    @csrf
                                    <input hidden value="{{$game->game_id}}" name="game_id"> </input>
                                    <input hidden value="{{$game->user_id}}" name="user_id"> </input>
                                    <input hidden value="0" name ="on_wishlist"></input>
                                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit"> Remove From Wishlist</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                            @endif
                    </table>    

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
