@props([
    'name', 
    'genre', 
    'debut_year', 
    'social_media_handle', 
    'profile_picture' => null
])

<div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 cursor-pointer p-5">
    
    @if($profile_picture)
        <img 
            src="{{ asset('images/artists/' . $profile_picture) }}" 
            alt="{{ $name }} Profile Picture" 
            class="w-32 h-32 rounded-full mx-auto object-cover"
        >
    @else
        <div class="w-32 h-32 rounded-full bg-gray-200 mx-auto flex items-center justify-center text-gray-500">
            No Image
        </div>
    @endif

    
    <div class="text-center mt-4">
        <h2 class="text-xl font-bold text-gray-800">{{ $name }}</h2>
        <p class="text-gray-500">{{ $genre }} • Debut: {{ $debut_year }}</p>
        @if($social_media_handle)
            <a href="https://twitter.com/{{ $social_media_handle }}" target="_blank" class="text-blue-500 hover:underline mt-2 block">
                @{{ $social_media_handle }}
            </a>
        @endif
    </div>
</div>
