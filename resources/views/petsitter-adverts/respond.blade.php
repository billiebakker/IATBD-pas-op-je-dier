{{-- create pet response form ----}}
<x-app-layout>
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Responding to:') }}
            </h2>
        @include('petsitter-adverts.show', ['petsitterAdvert' => $petsitterAdvert])

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Add a message') }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="POST" action="{{ route('petsitter-advert-responses.store', $petsitterAdvert) }}" class="mt-6 space-y-6">
            @csrf

            <input type="hidden" name="petsitter_advert_id" value="{{ $petsitterAdvert->id }}">

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                       for="message"
                >
                    {{ __('Message') }}
                </label>

                <textarea
                    class="border border-gray-400 p-2"
                    name="message"
                    id="message"
                    cols="50"
                    rows="6"
                ></textarea>

            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Send') }}</x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>
