<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($pets as $pet)
                @include('pets.partials.one-pet', ['pet' => $pet])
            @endforeach
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('pets.partials.create-pet-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
