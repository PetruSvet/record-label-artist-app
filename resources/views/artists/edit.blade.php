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

                    <!-- Title -->
                    <input 
                        type="text" 
                        name="title" 
                        placeholder="Song title" 
                        class="border p-2 rounded w-full" 
                        required
                    >

                    <!-- Release Date -->
                    <input 
                        type="date" 
                        name="release_date" 
                        placeholder="Release date" 
                        class="border p-2 rounded w-full"
                    >

                    <!-- Genre -->
                    <input 
                        type="text" 
                        name="genre" 
                        placeholder="Genre (e.g. Pop, Rock, R&B)" 
                        class="border p-2 rounded w-full"
                    >

                    <!-- Duration -->
                    <input 
                        type="text" 
                        name="duration" 
                        placeholder="Duration (e.g. 3:45)" 
                        class="border p-2 rounded w-full"
                    >

                    <button class="bg-blue-600 text-white px-4 py-2 rounded">Add Song</button>
                </form>
            </div>
            @endif

        <!-- Discography Table -->
        <h3 class="text-2xl font-semibold mb-4 mt-20">Discography</h3>
<table class="w-full border-collapse border border-slate-300 mt-4">
<thead class="bg-slate-200">
    <tr>
        <th class="border px-4 py-2 text-left">Title</th>
        <th class="border px-4 py-2 text-left">Release Date</th>
        <th class="border px-4 py-2 text-left">Genre</th>
        <th class="border px-4 py-2 text-left">Duration</th>
        <th class="border px-4 py-2 text-center">Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($artist->songs as $song)
    <tr class="hover:bg-slate-100">
        <td class="border px-4 py-2">{{ $song->title }}</td>

        <td class="border px-4 py-2">
            {{ $song->release_date ? \Carbon\Carbon::parse($song->release_date)->format('F d, Y') : '-' }}
        </td>

        <td class="border px-4 py-2">
            {{ $song->genre ?? '-' }}
        </td>

        <td class="border px-4 py-2">
            {{ $song->duration ?? '-' }}
        </td>

        <td class="border px-4 py-2 text-center">
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

    </div>
</x-app-layout>
