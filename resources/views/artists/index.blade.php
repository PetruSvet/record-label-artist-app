<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">                         <!-- Page header showing the title -->
            {{ __('All Artists') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}                 <!-- Success message -->
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Section title -->
                    <h3 class="font-semibold text-lg mb-4">List of Artists:</h3>
                    
                    <!-- Grid layout for artist cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($artists as $artist)
                        <div>
                            <a href="{{ route('artists.show', $artist) }}">                       <!-- Link to artist detail page -->
                                <!-- Display individual artist card -->
                                <x-artist-card
                                    :name="$artist->name"
                                    :genre="$artist->genre"
                                    :debut_year="$artist->debut_year"
                                    :social_media_handle="$artist->social_media_handle"
                                    :profile_picture="$artist->profile_picture"
                                />
                            </a>

                            <!-- Edit and delete buttons -->
                            <div class="mt-4 flex space-x-2">
                                <!-- Edit button linking to edit page -->
                                <a href="{{ route('artists.edit', $artist) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                    Edit
                                </a>

                                <!-- Delete form to remove artist -->
                                <form action="{{ route('artists.destroy', $artist) }}" method="POST"
                                      onsubmit="return confirm('Are you sure you want to delete this artist?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded"> 
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
