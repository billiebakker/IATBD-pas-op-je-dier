<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
    <div class="">
        <div class="px-4 py-2"
        >Replying to pet: <a href="/my-pets"> <strong>{{ $advertResponse->pet->name }},
                    {{ $advertResponse->pet->type }}</strong></a></div>

        <div class="bg-gray-100 p-4 rounded">
            {!!nl2br($advertResponse->message) !!}
        </div>
        <div class="px-4 py-2">Sent at {{ $advertResponse->created_at->format('j F, g:i A') }} by
            <strong>{{ $advertResponse->user->name }}</strong>
        </div>
    </div>

    @switch($advertResponse->getStatus())
        @case('pending')
            <div class="px-4 py-2 bg-yellow-200 rounded font-bold">Pending</div>
            @if($advertResponse->target_user_id === Auth::id())
                {{--                if user is petsitter --}}
                <div class="grid md:grid-cols-2 gap-2">
                    <form method="post" action="{{ route('advert-responses.accept', $advertResponse) }}">
                        @csrf
                        @method('put')
                        <x-primary-button type="submit" class="btn btn-success"
                                          onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Accept') }}
                        </x-primary-button>
                    </form>
                    <form method="post" action="{{ route('advert-responses.deny', $advertResponse) }}">
                        @csrf
                        @method('put')
                        <x-danger-button type="submit" class="btn btn-danger"
                                         onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Deny') }}
                        </x-danger-button>
                    </form>

                </div>
            @endif
            @break

        @case('accepted')
            <div class="px-4 py-2 bg-green-200 rounded font-bold">Accepted</div>
            @if($advertResponse->target_user_id === Auth::id())
                <div class="">
                    <h2>Leave a review</h2>
                    <form method="post" action="{{
                route('petsitter-adverts.review', $advertResponse) }}">
                        @csrf
                        @method('put')
                        <textarea
                            class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            name="review"
                            id="review"
                            cols="40"
                            rows="4"></textarea>
                        <x-primary-button>{{__('Submit')}}</x-primary-button>
                    </form>
                </div>
            @endif
            @break

        @case('denied')
            <div class="px-4 py-2 bg-red-200 rounded font-bold">Denied</div>
            @break
    @endswitch

    @if($advertResponse->user_id === auth()->user()->id)
        {{--        if outbox --}}
        <form method="post" action="{{ route('advert-responses.destroy', $advertResponse) }}">
            @csrf
            @method('delete')
            <x-danger-button type="submit" class="btn btn-danger"
                             onclick="event.preventDefault(); this.closest('form').submit();">
                {{ __('Delete') }}
            </x-danger-button>
        </form>
    @endif
</div>
