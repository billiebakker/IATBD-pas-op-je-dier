<x-app-layout>
    <div class="mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <div class="mx-auto sm:px-6 lg:px-8 grid md:grid-cols-2 gap-4">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Edit ') . $pet->name }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Enter your pet's details") }}
                    </p>
                </header>

                <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                    @csrf
                </form>

                <form method="POST" action="{{ route('pets.update', $pet) }}" class="mt-6 space-y-6"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div>
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                      :value="old('name', $pet->name)" required
                                      autofocus/>
                        <x-input-error class="mt-2" :messages="$errors->get('name')"/>
                    </div>

                    <div>
                        <label for="type">Animal Type</label>
                        <select name="type" id="type" class="mt-1 block w-full" required>
                            <option value="other" {{ old('type', $pet->type) == 'other' ? 'selected' : '' }}>Other
                            </option>
                            <option value="dog" {{ old('type', $pet->type) == 'dog' ? 'selected' : '' }}>Dog</option>
                            <option value="cat" {{ old('type', $pet->type) == 'cat' ? 'selected' : '' }}>Cat</option>
                            <option value="bird" {{ old('type', $pet->type) == 'bird' ? 'selected' : '' }}>Bird</option>
                            <option value="fish" {{ old('type', $pet->type) == 'fish' ? 'selected' : '' }}>Fish</option>
                            <option value="reptile" {{ old('type', $pet->type) == 'reptile' ? 'selected' : '' }}>Reptile
                            </option>
                            <option value="hamster" {{ old('type', $pet->type) == 'hamster' ? 'selected' : '' }}>Hamster
                            </option>
                            <option value="insect" {{ old('type', $pet->type) == 'insect' ? 'selected' : '' }}>Insect
                            </option>
                        </select>
                        <x-input-error class="mt-2" :messages="$errors->get('type')"/>
                    </div>

                    <div>
                        <x-input-label for="breed" :value="__('Breed')"/>
                        <x-text-input id="breed" name="breed" type="text" class="mt-1 block w-full"
                                      :value="old('breed', $pet->breed)"/>
                        <x-input-error class="mt-2" :messages="$errors->get('breed')"/>
                    </div>

                    <div>
                        <x-input-label for="age" :value="__('Age')"/>
                        <x-text-input id="age" name="age" type="number" class="mt-1 block w-full"
                                      :value="old('age', $pet->age)"/>
                        <x-input-error class="mt-2" :messages="$errors->get('age')"/>
                    </div>

                    <div>
                        <x-input-label for="picture" :value="__('Picture')"/>
                        <x-text-input id="picture" name="picture" type="file" class="mt-1 block w-full"
                                      autofocus autocomplete="picture"/>
                        <x-input-error class="mt-2" :messages="$errors->get('picture')"/>
                    </div>

                    <div>
                        <x-pet-picture :pet="$pet"/>
                    </div>

                    <div class="flex items-center gap-4">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
