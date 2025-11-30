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
    :recordlabels="$artist->recordlabels"
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
    </tr>
    @endforeach
</tbody>
</table>

<!--NOT DISPLAYING ACTIONS HERE SO THAT USER CANNOT EDIT SONGS AND NO NEED FOR ADMIN TOO HE CAN JUST USE THE EDIT FEATURE TO DELETE A SONG OR ADD ONE -->

<!-- Show message if no songs are present -->
@if($artist->songs->isEmpty())
    <p class="text-gray-500 mt-4">No songs have been found for the artist.</p>
@endif


    </div>
</x-app-layout>
