@props(['action', 'method', 'artist'])


<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    {{-- Artist Name --}}
    <div class="mb-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Artist Name</label>
        <input type="text" name="name" id="name" value="{{ old('name', $artist->name ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>         <!-- error message -->
        @enderror
    </div>

    {{-- Genre Field --}}
    <div class="mb-4">
        <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
        <input type="text" name="genre" id="genre" value="{{ old('genre', $artist->genre ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('genre')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Debut Year Field --}}
    <div class="mb-4">
        <label for="debut_year" class="block text-sm font-medium text-gray-700">Debut Year</label>
        <input type="number" name="debut_year" id="debut_year" value="{{ old('debut_year', $artist->debut_year ?? '') }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('debut_year')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Social Media Handle Field --}}
    <div class="mb-4">
        <label for="social_media_handle" class="block text-sm font-medium text-gray-700">Social Media Handle</label>
        <input type="text" name="social_media_handle" id="social_media_handle" value="{{ old('social_media_handle', $artist->social_media_handle ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('social_media_handle')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Description Field --}}
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ old('description', $artist->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Embed Video Field --}}
    <div class="mb-4">
        <label for="embed" class="block text-sm font-medium text-gray-700">YouTube Video Embed URL "MAKE SURE YOUR YOUTUBE LINK HAS 'embed' IN IT INSTEAD OF 'watch', FOR EXAMPLE: https://www.youtube.com/embed?v=czLQoG01PFs&list=RDczLQoG01PFs&start_radio=1</label>
        <input type="text" name="embed" id="embed" value="{{ old('embed', $artist->embed ?? '') }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('embed')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Profile Picture Upload --}}
    <div class="mb-4">
        <label for="profile_picture" class="block text-sm font-medium text-gray-700">Profile Picture</label>
        <input type="file" name="profile_picture" id="profile_picture" {{ isset($artist) ? '' : 'required' }} class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"/>
        @error('profile_picture')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Show existing image if editing --}}
    @isset($artist->profile_picture)
        <div class="mb-4">
            <img src="{{ asset('images/artists/' . $artist->profile_picture) }}" alt="{{ $artist->name }}" class="w-24 h-24 object-cover rounded-full">
        </div>
    @endisset

    {{-- Submit Button --}}
    <div>
        <x-primary-button>
            {{ isset($artist) ? 'Update Artist' : 'Add Artist' }}
        </x-primary-button>
    </div>
</form>
