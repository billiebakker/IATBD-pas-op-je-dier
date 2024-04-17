<x-app-layout>
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
        @if(Route::is('pets.my-pets'))

            @include('pets.partials.create-pet-form')
        @endif
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($pets as $pet)
                @include('pets.show', ['pet' => $pet, 'showRespondButton' => true])
            @endforeach
        </div>
    </div>
</x-app-layout>
