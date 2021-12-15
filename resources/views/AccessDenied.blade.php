<x-app-layout>
    <x-slot name="header">
        <h2 style="text-align:center;" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ACCESS DENIED') }}
        </h2>
    </x-slot>

    <div class="py-12" x-init="tabletop.index.helloWorld()">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" flex content-center p-6 bg-white border-b border-gray-200">
                <iframe class="mx-auto" width="900" height="506" src="https://www.youtube.com/embed/g_vZasFzMN4?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>