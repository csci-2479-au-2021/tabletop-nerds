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
                        <x-game :game="$game"></x-game>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
