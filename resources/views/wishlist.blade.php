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
                    <h3 class="text-green-600 text-5xl font-bold">Your Wishlist </h3>
                    <table class="table-fixed border-collapse border-green-800">
                        <tr>
                            <th class="w-1/3 border border-green-600">Game Image</th> 
                            <th class="w-1/2 border border-green-600">Game Title</th> 
                            <th class="w-1/3 border border-green-600">Price</th> 
                        </tr>
                        <tr>
                            <td class="content-center border border-green-600"><img src="{{url('/images/monopoly.jpg')}}" alt="Monopoly"> </td> 
                            <td class="text-center  border border-green-600">Monopoly </td>
                            <td class="text-center border border-green-600"> $29.99</td> 
                        </tr>
                    </table>    

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
