<div class="p-6 flex space-x-2">

    <div class="flex-1">
        <div class="flex items-center">
            <div>
                <span class="text-xl">{{ __('Advert') }}</span>
            </div>
        </div>
        @if($pet->advert_active)
            <div class="mt-4">
                <p><strong>Description: </strong> {{ $pet->description }}</p>

                @if($pet->begin_date)
                    <p><strong>Begin date: </strong> {{ $pet->begin_date }}</p>
                @endif
                @if($pet->end_date)
                    <p><strong>End date: </strong> {{ $pet->end_date }}</p>
                @endif
                @if($pet->city)
                    <p><strong>city:</strong> {{ $pet->city }}</p>
                @endif
            </div>
        @else
            <div class="mt-4">
                <p><strong>Advert is not active</strong></p>
            </div>
        @endif

        <div class="mt-4">
            @if(!$pet->user->is(auth()->user()) && $showRespondButton && $pet->advert_active)
                <a href="{{ route('pets.respond', $pet) }}">
                    <x-primary-button type="submit" class="btn btn-primary">
                        {{ __('Respond') }}
                    </x-primary-button>
                </a>
            @endif
        </div>
    </div>
</div>
