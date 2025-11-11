<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Artist') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">

        <!-- Artist Form Fields -->
        <x-artist-form 
            :action="route('artists.update', $artist)" 
            method="PUT"
            :artist="$artist"
        />

        <!-- Add Song Form -->
        @if(auth()->user()->role === 'admin')
        <div class="mt-10 bg-slate-50 p-4 rounded shadow">
            <h3 class="text-2xl font-semibold mb-4">Add New Song</h3>
            <form action="{{ route('songs.store') }}" method="POST" class="space-y-2">
                @csrf
                <input type="hidden" name="artist_id" value="{{ $artist->id }}">
                <input type="text" name="title" placeholder="Song title" class="border p-2 rounded w-full" required>
                <input type="date" name="release_date" placeholder="Release date" class="border p-2 rounded w-full">
                <select name="record_label" class="border p-2 rounded w-full">
                    <option value="">Select a label (or type below)</option>
                    <option value="Motown Records">Motown Records</option>
                    <option value="CBS Records">CBS Records</option>
                    <option value="Epic Records">Epic Records</option>
                </select>
                <input type="text" name="record_label_custom" placeholder="Or type your own label" class="border p-2 rounded w-full">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Add Song</button>
            </form>
        </div>
        @endif

        <!-- Discography Table -->
        <div class="mt-8">
            <h3 class="text-2xl font-semibold mb-4">Discography</h3>
            <table class="w-full border-collapse border border-slate-300">
                <thead class="bg-slate-200">
                    <tr>
                        <th class="border px-4 py-2 text-left">Title</th>
                        <th class="border px-4 py-2 text-left">Release Date</th>
                        <th class="border px-4 py-2 text-left">Record Label</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($artist->songs as $song)
                    <tr class="hover:bg-slate-100">
                        <td class="border px-4 py-2">{{ $song->title }}</td>
                        <td class="border px-4 py-2">{{ $song->release_date ? \Carbon\Carbon::parse($song->release_date)->format('F d, Y') : '-' }}</td>
                        <td class="border px-4 py-2">{{ $song->record_label ?? '-' }}</td>
                        <td class="border px-4 py-2 flex gap-2 flex justify-around">
                            <form action="{{ route('songs.destroy', $song) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($artist->songs->isEmpty())
                <p class="text-gray-500 mt-4">No songs have been found for the artist.</p>
            @endif
        </div>

        <!-- Update Artist Button at the very bottom because the button was just stuck in the middle of the page between the profile pic upload and discography -->
        <div class="mt-6">
            <form action="{{ route('artists.update', $artist) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Hidden inputs to carry existing values from artist.form.blade.php -->
                <input type="hidden" name="name" value="{{ old('name', $artist->name) }}">
                <input type="hidden" name="genre" value="{{ old('genre', $artist->genre) }}">
                <input type="hidden" name="debut_year" value="{{ old('debut_year', $artist->debut_year) }}">
                <input type="hidden" name="social_media_handle" value="{{ old('social_media_handle', $artist->social_media_handle) }}">
                <input type="hidden" name="description" value="{{ old('description', $artist->description) }}">
                <input type="hidden" name="embed" value="{{ old('embed', $artist->embed) }}">
                
                <x-primary-button>Update Artist</x-primary-button>
            </form>
        </div>

    </div>
</x-app-layout>
