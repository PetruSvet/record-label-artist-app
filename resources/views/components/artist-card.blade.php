@props(['name', 'genre', 'debut_year', 'social_media_handle', 'profile_picture' => null, 'description => null'])  <!-- Props define the data this reusable component accepts from the parent view -->

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 text-center">

    @if($profile_picture)
        <img src="{{ asset('images/artists/' . $profile_picture) }}" alt="{{ $name }}" class="mx-auto mb-4 rounded-full w-32 h-32 object-cover">  <!-- Display artist profile picture if available -->
    @endif

    <!-- Display artist name and basic info -->
    <h4 class="font-bold text-lg">{{ $name }}</h4>
    <p class="text-gray-600">{{ $genre }} &bull; Debut: {{ $debut_year }}</p>

    @if($social_media_handle)
        <p class="text-blue-500 hover:underline mt-2">  <!-- Clicking the link takes you to the artist's wikipedia page -->
            <a href="https://en.wikipedia.org/wiki/{{ $name }}" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:underline">
                {{ $social_media_handle }}
            </a>
        </p>
    @endif
</div>
