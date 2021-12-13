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
                    <h3 class="text-5xl font-bold">Welcome, Admin! </h3>
                    <br>
                    <table class="table-fixed border-collapse border-green-800">
                        <tr>
                            <!-- <th class="w-1/4 border border-green-600">Game Image</th>  -->
                            <th class="w-1/4 border border-green-600">Game Title</th> 
                            <th class="w-1/4 border border-green-600">Game Description</th>
                            <th class="w-1/4 border border-green-600"> Publisher </th>
                            <th class="w-1/4 border border-green-600"> Release Year </th>
                            <th class="w-1/4 border border-green-600"> Categories </th>
                            <th class="w-1/4 border border-green-600"> Game Status </th>
                            <th class="w-1/4 border border-green-600">Update/Delete</th> 
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
                                {{$cat->name}}
                                @endforeach
                            </td>
                            @if($game->is_deleted == 0)
                            <td class="text-center border border-green-600"> Active </td>
                            <td class="text-center border border-green-600"> 
                            <a href="{{ route('UpdateGame', ['id' => $game->id]) }}">Update</a>/
                            <a href="{{ route('ActivateDeactivate', ['id' => $game->id]) }}">Delete</a>
                            <td>
                            @else
                            <td class="text-center border border-green-600"> Deleted </td>
                            <td class="text-center border border-green-600"> 
                            <a href="{{ route('UpdateGame', ['id' => $game->id]) }}">Update</a>/
                            <a href="{{ route('ActivateDeactivate', ['id' => $game->id]) }}">Reactivate</a>
                            <td>
                            @endif
                        </tr>
                        @endforeach
                    </table>    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
