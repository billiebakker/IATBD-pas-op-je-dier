<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($advertResponses as $advertResponse)
                @include('advert-responses.show', ['advertResponse' => $advertResponse])
            @endforeach
        </div>
    </div>
</x-app-layout>
