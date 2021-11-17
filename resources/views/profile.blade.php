<x-app-layout>
    <x-slot name="header">
        <h2 style="text-align:center;" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div style="text-align:center;"class="p-6 bg-white border-b border-gray-200">
                    User ID: {{ $userId }}</br>
                    Name: {{ $userName }}</br>
                    Email: {{ $userEmail }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>