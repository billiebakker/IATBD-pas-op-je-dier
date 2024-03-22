<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('pets.partials.one-pet', ['pet' => $pet])
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
