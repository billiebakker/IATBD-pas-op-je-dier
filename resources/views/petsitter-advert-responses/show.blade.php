<div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg space-y-6">
    <div class="">
        <div class="px-4 py-2">In response to: <strong>{{ $advertResponse->petsitterAdvert->name }}</strong></div>


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
                <div class="grid md:grid-cols-2 gap-2">
                    <form method="post" action="{{ route('petsitter-advert-responses.accept', $advertResponse) }}">
                        @csrf
                        @method('put')
                        <x-primary-button type="submit" class="btn btn-success"
                                          onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Accept') }}
                        </x-primary-button>
                    </form>
                    <form method="post" action="{{ route('petsitter-advert-responses.deny', $advertResponse) }}">
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
    @if($advertResponse->petsitter_advert_id)

    @endif
</div>
