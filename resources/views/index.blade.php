<x-app-layout>
    <x-slot name="header">
        <h2 style="text-align:center;" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Index/Home/Not Laravel') }}
        </h2>
    </x-slot>

    <div class="py-12" x-init="tabletop.index.helloWorld()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="text-align:center;"class="p-6 bg-white border-b border-gray-200">
                    Anything other than the horrible splash landing Andrew hates.
                    <br>
                    <br>
                    @if(auth()->user())
                    <a style ="padding:.5%;" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{route('makeMeAAdmin')}}"> Make Me Admin</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>