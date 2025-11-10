<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artist Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <!-- artist details -->
        <x-artist-details 
            :name="$artist->name" 
            :genre="$artist->genre" 
            :debut_year="$artist->debut_year" 
            :social_media_handle="$artist->social_media_handle" 
            :profile_picture="$artist->profile_picture"
            :description="$artist->description"
            :embed="$artist->embed"
        />

        <!-- Songs Section -->
        <div class="mt-10">
            <h3 class="text-2xl font-semibold mb-4">Songs</h3>

            <!-- Add Song Form -->
            <form action="{{ route('songs.store') }}" method="POST" class="flex gap-2 mb-4">
                @csrf
                <input type="hidden" name="artist_id" value="{{ $artist->id }}">
                <input type="text" name="title" placeholder="New song title" class="border p-2 rounded w-full">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Add Song</button>
            </form>

            <!-- List of Songs -->
            <ul class="space-y-3">
                @foreach ($artist->songs as $song)
                    <li class="flex justify-between items-center bg-slate-100 p-3 rounded">
                        <!-- Edit Song -->
                        <form action="{{ route('songs.update', $song) }}" method="POST" class="flex gap-2 w-full">
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" value="{{ $song->title }}" class="border p-2 rounded w-full">
                            <button class="bg-green-500 text-white px-3 py-1 rounded">Save</button>
                        </form>

                        <!-- Delete Song -->
                        <form action="{{ route('songs.destroy', $song) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>

            @if ($artist->songs->isEmpty())
                <p class="text-gray-500 mt-4">No songs found for this artist.</p>
            @endif
        </div>
    </div>
</x-app-layout>
