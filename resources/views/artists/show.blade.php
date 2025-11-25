<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Artist Details') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">

        <!-- Artist Details -->
        <x-artist-details 
            :name="$artist->name" 
            :genre="$artist->genre" 
            :debut_year="$artist->debut_year" 
            :social_media_handle="$artist->social_media_handle" 
            :profile_picture="$artist->profile_picture"
            :description="$artist->description"
            :embed="$artist->embed"
        />



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


<!-- Show message if no songs are present -->
@if($artist->songs->isEmpty())
    <p class="text-gray-500 mt-4">No songs have been found for the artist.</p>
@endif


    </div>
</x-app-layout>
