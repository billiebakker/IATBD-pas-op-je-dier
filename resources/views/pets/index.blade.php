<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if(Route::is('pets.my-pets'))
                {{ __('My Pets') }}
            @else
                {{ __('Pet Ads') }}
            @endif
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8">

        @if(session('status'))
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <strong class="font-bold">success!</strong>
                            <span class="block sm:inline">{{ session('status') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @includeWhen(Route::is('pets.my-pets'), 'pets.partials.create-pet-form')

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @each('pets.show', $pets, 'pet')
        </div>
    </div>
</x-app-layout>
