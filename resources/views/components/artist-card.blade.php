@props([
    'name',
    'genre' => null,
    'debutYear' => null,
    'socialMediaHandle' => null,
    'profilePicture' => null,
])

<div class="border rounded-lg shadow-md p-6 bg-white hover:shadow-lg transition duration-300 text-center">
    @if($profilePicture)
        <img src="{{ asset('images/artists/' . $profilePicture) }}"
             alt="{{ $name }}'s profile picture"
             class="w-32 h-32 object-cover rounded-full mx-auto mb-4 shadow-sm">
    @else
        <img src="{{ asset('images/artists/default.jpg') }}"
             alt="Default profile picture"
             class="w-32 h-32 object-cover rounded-full mx-auto mb-4 shadow-sm">
    @endif

    <h4 class="font-bold text-lg mb-2">{{ $name }}</h4>
    <p class="text-gray-600 mb-1"><span class="font-medium">Genre:</span> {{ $genre ?? 'Unknown' }}</p>
    <p class="text-gray-600 mb-1"><span class="font-medium">Debut Year:</span> {{ $debutYear ?? 'N/A' }}</p>

    @if($socialMediaHandle)
        <a href="https://instagram.com/{{ ltrim($socialMediaHandle, '@') }}" 
           target="_blank" 
           class="text-blue-500 font-medium hover:underline">
            {{ $socialMediaHandle }}
        </a>
    @endif
</div>
