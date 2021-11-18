<x-app-layout>
    <x-slot name="header">
        <h2 class="text-5xl font-bold">
            {{ __('Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-600  border-b border-gray-200 grid gap-4">
                        @foreach($games as $game)
                        <div class="grid grid-cols-7 grid-rows-1 gap-1 rounded-lg border-4 border-gray-200 bg-gray-400 shadow-2xl shadow-inner">
                                <div class="col-span-3">
                                    <a href="{{ route('gameView', ['id' => $game->id]) }}"><img class="max-w-xs" src="{{$game->image}}"  alt="{{$game->title}}"></a>
                                </div>
                                <div class="col-span-2 place-items-center">
                                    <br><br><br><br><br>
                                    <a class="text-4xl text-white font-semibold" href="{{ route('gameView', ['id' => $game->id]) }}">{{$game->title}}</a>
                                </div>
                                <div class="col-span-2 align-left">
                                    <br><br><br><br><br>
                                    <form method="post" action="{{ route('addToWishlist') }}">
                                    @csrf
                                    <input hidden value="{{$game->id}}" name="game_id"> </input>
                                    <input hidden value="1" name ="on_wishlist"></input>
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xl shadow-inner" type="submit"> Add To Wishlist</button><br><br><br>
                                    </form>
                                </div>    
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-green-600 text-5xl font-bold">Board Games </h3>
                    <table class="table-fixed border-collapse border-green-800">
                        <tr>
                            <th class="w-1/4 border border-green-600">Game Image</th> 
                            <th class="w-1/4 border border-green-600">Game Title</th> 
                            <th class="w-1/4 border border-green-600">View Game</th> 
                        </tr>
                        
                        @foreach($games as $key=>$game) 
                        <tr>
                            <td class="content-center border border-green-600"><img src="{{$game->image}}"> </td> 
                            <td class="text-center  border border-green-600">{{$game->title}}</td>
                            <td class="text-center border border-green-600">
                            <a href="{{ route('gameView', ['id' => $key]) }}">View Game Details</a>    
                            
                            </td>
                                                      
                        </tr>  
                        @endforeach
                        
                    </table>    

                    
                </div>
            </div>
        </div>
    </div> -->

    


    
</x-app-layout>
