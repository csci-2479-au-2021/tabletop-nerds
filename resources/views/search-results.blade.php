<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search...') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-red-600 text-2xl font-bold">Possible matches: </h3></br>
                        @if($games->isNotEmpty())
                        @foreach ($games as $game)
                        <a href="{{ route('gameView', ['title' => $key]) }}">{{ $game->title }}</a>
                </div>
                    @endforeach
                    @else 
                <div>
                    Nothing found! =(
                </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</x-app-layout>