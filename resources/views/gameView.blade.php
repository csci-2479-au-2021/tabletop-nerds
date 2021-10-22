<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($game->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="table-fixed border-collapse border-green-800">
                        <tr>
                            <th class="w-1/2 border border-green-600">Game Image</th> 
                            <th class="w-1/2 border border-green-600">Game Description</th>
                        </tr>
                        <tr>
                            <td class="content-center border border-green-600"><img src="{{$game->image}}"> </td> 
                            <td class="text-center border border-green-600">{{$game->description}}</td>                   
                        </tr>  
                    </table>  
                    </table> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
