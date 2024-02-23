<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Pet information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Add your pet's details") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('pets.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required
                          autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="type" :value="__('Type')"/>
            <x-text-input id="type" name="type" type="text" class="mt-1 block w-full" :value="old('type')" required/>
            <x-input-error class="mt-2" :messages="$errors->get('type')"/>
        </div>

        <div>
            <x-input-label for="breed" :value="__('Breed')"/>
            <x-text-input id="breed" name="breed" type="text" class="mt-1 block w-full" :value="old('breed')"/>
            <x-input-error class="mt-2" :messages="$errors->get('breed')"/>
        </div>

        <div>
            <x-input-label for="age" :value="__('Age')"/>
            <x-text-input id="age" name="age" type="number" class="mt-1 block w-full" :value="old('age')"/>
            <x-input-error class="mt-2" :messages="$errors->get('age')"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>


</section>
