<div class="p-6 flex space-x-2">

    <div class="flex-1">
        <div class="flex items-center">
            <div>
                <span class="text-xl"> <strong>{{ $pet->name }}</strong>, {{ $pet->type }}</span>
                <span>
                    <x-pet-picture :pet="$pet"/>
                </span>
            </div>
            @if ($pet->user->is(auth()->user()))
                <x-dropdown>
                    <x-slot name="trigger">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                 viewbox="0 0 20 20" fill="currentcolor">
                                <path
                                    d="m6 10a2 2 0 11-4 0 2 2 0 014 0zm12 10a2 2 0 11-4 0 2 2 0 014 0zm16 12a2 2 0 100-4 2 2 0 000 4z"/>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('pets.edit', $pet)">
                            {{ __('edit') }}
                        </x-dropdown-link>
                        <form method="post" action="{{ route('pets.destroy', $pet) }}">
                            @csrf
                            @method('delete')
                            <x-dropdown-link :href="route('pets.destroy', $pet)"
                                             onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('delete') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endif
        </div>
        <div class="mt-4">
            @if($pet->user->is(auth()->user()))
                <p><strong> You own this pet </strong></p>
            @endif
            @if($pet->breed)
                <p><strong>breed:</strong> {{ $pet->breed }}</p>
            @endif
            @if($pet->age)
                <p><strong>age:</strong> {{ $pet->age }}</p>
            @endif
        </div>
    </div>
</div>
