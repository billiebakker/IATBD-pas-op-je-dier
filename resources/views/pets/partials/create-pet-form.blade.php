<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add a pet') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Enter your pet's details") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('pets.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required
                          autofocus/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            {{--            <x-input-label for="type" :value="__('Type')"/>--}}
            <label for="type">Animal Type</label>
            <select name="type" id="type" class="mt-1 block w-full" required>
                <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>Other</option>
                <option value="dog" {{ old('type') == 'dog' ? 'selected' : '' }}>Dog</option>
                <option value="cat" {{ old('type') == 'cat' ? 'selected' : '' }}>Cat</option>
                <option value="bird" {{ old('type') == 'bird' ? 'selected' : '' }}>Bird</option>
                <option value="fish" {{ old('type') == 'fish' ? 'selected' : '' }}>Fish</option>
                <option value="reptile" {{ old('type') == 'reptile' ? 'selected' : '' }}>Reptile</option>
                <option value="hamster" {{ old('type') == 'hamster' ? 'selected' : '' }}>Hamster</option>
                <option value="insect" {{ old('type') == 'insect' ? 'selected' : '' }}>Insect</option>
            </select>
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

        <div>
            <x-input-label for="picture" :value="__('Picture')"/>
            <x-text-input id="picture" name="picture" type="file" class="mt-1 block w-full"
                          autofocus autocomplete="picture"/>
            <x-input-error class="mt-2" :messages="$errors->get('picture')"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>


</section>
