<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Home') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold">Welcome Admin, </h3>
                    <br>
                    <h3> Use these links and tables to manage the content of TableTop-Nerds.</h3>
                    <br>
                    <br>
                    <h1 class="text-2xl font-bold">Add Games/Publishers/Categories </h1>
                    <x-responsive-nav-link :href="route('AddGame')" :active="request()->routeIs('AddGame')">
                    {{ __('Add Game') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('wishlist')" :active="request()->routeIs('wishlist')">
                    {{ __('Add Category') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('wishlist')" :active="request()->routeIs('wishlist')">
                    {{ __('Add Publisher') }}
                    </x-responsive-nav-link>
                    <br>
                    <br>

                    <h1 class="text-2xl font-bold">Current Game List</h1>
                    <table class="table-fixed border-collapse border-green-800">
                        <tr>
                            <!-- <th class="w-1/4 border border-green-600">Game Image</th>  -->
                            <th class="w-1/8 border border-green-600">Game Title</th> 
                            <th class="w-1/8 border border-green-600">Game Description</th>
                            <th class="w-1/8 border border-green-600"> Publisher </th>
                            <th class="w-1/8 border border-green-600"> Release Year </th>
                            <th class="w-1/8 border border-green-600"> Categories </th>
                            <th class="w-1/8 border border-green-600"> Game Status </th>
                            <th class="w-1/8 border border-green-600"> Update </th>
                            <th class="w-1/8 border border-green-600"> Deactivate </th> 
                        </tr>
                        @foreach($games as $game) 
                        <tr>
                            <!-- <td class="content-center border border-green-600">
                            <a href="{{ route('gameView', ['id' => $game->id]) }}"><img src="{{$game->image}}"  alt="{{$game->title}}"></a>
                            </td> -->
                            <td class="text-center  border border-green-600">{{$game->title}}</td>
                            <td class="text-center border border-green-600">{{$game->description}}</td>
                            <td class="text-center border border-green-600"> {{$game->publisher->name}}</td>
                            <td class="text-center border border-green-600">{{$game->release_year}}</td>
                            <td class="text-center border border-green-600"> 
                                @foreach($game->gameCategory as $cat)
                                {{$cat->name}}<br>
                                @endforeach
                            </td>
                            @if($game->is_deleted == 0)
                            <td class="text-center border border-green-600"> Active </td>
                            <td class="p-1 text-center border border-green-600"> 
                            <a style ="padding:.5%;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" href="{{ route('UpdateGame', ['id' => $game->id]) }}">Update</a>
                            </td>
                            <td class="p-1 text-center border border-green-600"> 
                            <a style ="padding:.5%;" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('ActivateDeactivate', ['id' => $game->id]) }}">Deactivate</a>
                            </td>
                            @else
                            <td class="text-center border border-green-600"> Deactivated </td>
                            <td class="p-1 text-center border border-green-600"> 
                            <a style ="padding:.5%;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" href="{{ route('UpdateGame', ['id' => $game->id]) }}">Update</a>
                            </td>
                            <td class="p-1 text-center border border-green-600"> 
                            <a style ="padding:.5%;" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded" href="{{ route('ActivateDeactivate', ['id' => $game->id]) }}">Activate</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </table>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
