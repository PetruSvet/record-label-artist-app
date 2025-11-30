@props([
    //artist information being passed down from controller
    'name',
    'genre',
    'debut_year',
    'social_media_handle',
    'profile_picture' => null,
    'description' => null,
    'embed' => null,
    'recordlabels' => collect(),   
])


<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 p-6">

    {{-- Profile picture --}}
    @if($profile_picture)
        <img src="{{ asset('images/artists/' . $profile_picture) }}" 
             alt="{{ $name }}" 
             class="mx-auto mb-4 rounded-full w-32 h-32 object-cover border-2 border-gray-300">
    @endif

    {{-- Artist info --}}
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800">{{ $name }}</h2>
        <p class="text-gray-600">{{ $genre }} • Debut: {{ $debut_year }}</p>

{{-- Record Labels --}}
<p class="text-gray-700 mt-2">
    <strong>Record Labels:</strong>
    @if($recordlabels->count() > 0)
        {{ $recordlabels->pluck('name')->join(', ') }}
    @else
        No record labels assigned.
    @endif
</p>


        {{-- Social media link --}}
        @if($social_media_handle)
            <p class="mt-2">
                <a href="{{ $social_media_handle }}" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="text-blue-500 hover:underline">
                   {{ $social_media_handle }}
                </a>
            </p>
        @endif

        {{-- Description --}}
        @if($description)
            <p class="text-gray-700 mt-4">{{ $description }}</p>
        @endif
    </div>

    {{-- Embedded video --}}
    @if($embed)
        <div class="mt-6 relative pb-[56.25%] h-0 rounded-lg overflow-hidden">
            <iframe 
                class="absolute top-0 left-0 w-full h-full rounded-lg"
                src="{{ $embed }}" 
                title="YouTube video"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen>
            </iframe>
        </div>
    @endif

</div>
