<div class="py-12">
    <div class="mx-auto sm:px-6 lg:px-8 grid md:grid-cols-2 gap-4">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="">

                <div class="p-6 flex space-x-2">

                    <div class="flex-1">
                        <div class="flex items-center">
                            <div>
                                <span class="text-xl"> <strong>{{ $petsitterAdvert->name }}</strong></span>
                                <span>
                    <x-picture :source="$petsitterAdvert->picture" :alt="$petsitterAdvert->name"/>
                </span>
                            </div>

                        </div>
                        <div class="mt-4">
                                <p><strong>City:</strong> {{ $petsitterAdvert->city }}</p>
                                <p><strong>Description:</strong> {{ $petsitterAdvert->description }}</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
