    <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Artists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Artists:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($artists as $artist)
                        <div>
                            <a href="{{ route('artists.show', $artist) }}">
                            

                                <x-artist-card
                                    :name="$artist->name"
                                    :genre="$artist->genre"
                                    :debut_year="$artist->debut_year"
                                    :social_media_handle="$artist->social_media_handle"
                                    :profile_picture="$artist->profile_picture"
                                    
                                />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
