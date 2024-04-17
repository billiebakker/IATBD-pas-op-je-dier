<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($petsitterAdverts as $petsitterAdvert)
                @include('petsitter-adverts.show', ['petsitterAdvert' => $petsitterAdvert])
            @endforeach
        </div>
    </div>
</x-app-layout>
